<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionLimits;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\TransferIntent;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $paymentIntentData['user_id'] = Auth::id();

        $limit = TransactionLimits::where('country_code', Auth::user()->country_code)->first();

        $totalToday = Transaction::totalAmountForToday(Auth::id());
        $totalLast30Days = Transaction::totalAmountForLast30Days(Auth::id());

        if ($request->input('amount') + $totalToday >= $limit->daily_limit) {
            return response()->json([
                'status' => false,
                'message' => 'Daily maximum transaction limit of ' . $limit->daily_limit . ' has been reached'
            ], 400);
        }

        if ($request->input('amount') + $totalLast30Days >= $limit->monthly_limit) {
            return response()->json([
                'status' => false,
                'message' => 'Monthly maximum transaction limit of ' . $limit->monthly_limit . ' has been reached'
            ], 400);
        }

        try {
            // Stripe::setApiKey(config('services.stripe.STRIPE_SECRET_KEY'));
            Stripe::setApiKey("sk_test_51JGmb7CPuHcGXdFKiLVM6lcJdy4Uc8S2qSg1yc6mbpkdXPIzBxEkBQsWNCXXPlDKZBsqpZmFsouzU4kTaAG9Vvqj00jFAfXtBU");

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->input('amount'),
                'currency' => $request->input('currency', 'usd'),
                'automatic_payment_methods' => ['enabled' => true],
                'metadata' => [
                    'beneficiary_id' => $request->input('beneficiary_id'),
                    'beneficiary_account_id' => $request->input('beneficiary_account_id'),
                    'beneficiary_account_number' => $request->input('beneficiary_account_number'),
                    'beneficiary_account_name' => $request->input('beneficiary_account_name'),
                    'beneficiary_bank_name' => $request->input('beneficiary_bank_name'),
                    'beneficiary_bank_code' => $request->input('beneficiary_bank_code')
                ]
            ]);

            $paymentIntentData['intent_id'] = $paymentIntent->client_secret;
            $paymentIntentData['payment_intent_data'] = $paymentIntent;

            TransferIntent::create($paymentIntentData);

            return response()->json([
                'status' => true,
                'message' => 'Payment intent created successfully',
                'data' => [
                    'intent_id' => $paymentIntent->client_secret
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
