<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;
use Stripe\Stripe;
use App\Http\Controllers\Controller;
use App\Models\BeneficiaryAccount;
use App\Models\Kyc;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class WebhookController extends Controller
{
    public function handleStripeWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                config('services.stripe.endpoint_secret')
            );
        } catch (SignatureVerificationException $e) {
            return response()->json(['status' => false, 'message' => 'Invalid signature'], 400);
        }

        switch ($event->type) {
            case 'payment_intent.succeeded':
                $intent = $event->data->object;
                $paymentIntent = $intent->client_secret;

                $transaction = Transaction::where('payment_intent', $paymentIntent)->first();

                if ($transaction) {
                    $transaction->update(['transaction_status' => 'success']);

                    $beneficiary_account_id = $transaction->beneficiary_account_id;

                    $beneficiary_account = BeneficiaryAccount::find($beneficiary_account_id);

                    $beneficiary_extra_datas = json_decode($beneficiary_account->extra_datas, true);

                    if (json_last_error() === JSON_ERROR_NONE && isset($beneficiary_extra_datas['customer_id'])) {
                        $bank_id = $beneficiary_extra_datas['bank_account_id'];
                    } else {
                        return response()->json(['error' => 'Missing bank_account_id in extra_datas'], 500);
                    }

                    $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

                    $stripe->payouts->create([
                        'amount' => $transaction->received_amount,
                        'currency' => 'usd',
                        'method' => 'instant',
                        'destination' => $bank_id,
                    ]);
                }

                break;
            case 'payment_intent.payment_failed':
                $intent = $event->data->object;
                $paymentIntent = $intent->id;

                $transaction = Transaction::where('payment_intent', $paymentIntent)->first();

                if ($transaction) {
                    $transaction->update(['transaction_status' => 'failed']);
                }
                break;
        }

        return response()->json(['status' => true, 'message' => 'success']);
    }

    public function siodataWebHook(Request $request)
    {
        if ($request->payload && $user_email = $request->payload['external_id']) {
            $user = User::where('email', $user_email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found', 'message_type' => 'error'], 400);
            }

            $event_type = $request->event_type;

            if ($event_type === 'DOCVER') {
                // Handle DOCVER event
                $status = $request->payload['status'];
                if ($status == 'verified') {
                    try {
                        Kyc::where('user_id', $user->id)->update([
                            'status' => 'approved'
                        ]);
                        return response()->json(['message' => 'Mobile User Approved', 'message_type' => 'success'], 200);
                    } catch (\Exception $e) {
                        Log::error($e->getMessage(), ['exception' => $e]);
                        return response()->json(['message' => "An error occurred " . $e->getMessage()], 500);
                    }
                } else if ($status == 'failed') {
                    $failure_reason = '';
                    $checks = $request->payload['checks'];

                    foreach ($checks as $check) {
                        $failure_reason .= ' Document: ' . ($check['data']['document_type'] ?? 'Unknown');
                        $failure_reason .= " Status: " . $check['status'];
                        foreach ($check['errors'] as $err) {
                            $failure_reason .= " Errors: " . $err['message'];
                        }
                        $failure_reason .= ", ";
                    }
                    try {
                        Kyc::where('user_id', $user->id)->update([
                            'status' => 'rejected',
                            'rejection_reason' => $failure_reason,
                            'kyc_level' => 0,
                        ]);
                        return response()->json(['message' => 'KYC Rejected', 'message_type' => 'error'], 500);
                    } catch (\Exception $e) {
                        Log::error($e->getMessage(), ['exception' => $e]);
                        return response()->json(['message' => "An error occurred " . $e->getMessage()], 500);
                    }
                } else {
                    // Do nothing, leave it in its default state of pending.
                }
            } else if ($event_type === 'DOCVER_CHECKS') {
                // Handle DOCVER_CHECKS event
                $result = $request->payload['result'];
                $status = $result['status'];
                $failure_reason = 'Step: ' . $request->payload['step'] . ', ';
                if ($status == 'failed') {
                    $document_type = $result['data']['document_type'] ?? 'Unknown';
                    $failure_reason .= ' Document: ' . $document_type;
                    $failure_reason .= " Status: " . $status;
                    if (isset($result['errors']) && count($result['errors']) > 0) {
                        foreach ($result['errors'] as $err) {
                            $failure_reason .= " Errors: " . $err['message'];
                        }
                    } else {
                        $failure_reason .= " No specific errors provided.";
                    }
                    $failure_reason .= ", ";
                    try {
                        Kyc::where('user_id', $user->id)->update([
                            'status' => 'rejected',
                            'rejection_reason' => $failure_reason,
                            'kyc_level' => 0,
                        ]);
                        return response()->json(['message' => 'KYC Rejected', 'message_type' => 'error'], 500);
                    } catch (\Exception $e) {
                        Log::error($e->getMessage(), ['exception' => $e]);
                        return response()->json(['message' => "An error occurred " . $e->getMessage()], 500);
                    }
                } else {
                    // Do nothing for other statuses.
                }
            } else {
                return response(['Event Ignored, only listening for DOCVER and DOCVER_CHECKS events'], 200);
            }
        } else {
            return response()->json(['message' => 'User not found', 'message_type' => 'error'], 400);
        }
    }
}
