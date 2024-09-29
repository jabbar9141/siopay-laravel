<?php

namespace App\Http\Controllers;

use App\Models\Dispatcher;
use App\Models\Kyc;
use App\Models\User;
use App\Models\WalkInCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;

use CodiceFiscale\InverseCalculator;
use CodiceFiscale\Calculator;
use CodiceFiscale\Subject;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class WalkInCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.customer_kyc');
    }

    public function allWalkInCusList()
    {
        $users = WalkInCustomer::orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('kyc_status', function ($user) {
                $mar = "<span class= 'badge bg-secondary'>" . $user->kyc_status . "</span><br>";
                return $mar;
            })
            ->addColumn('surname', function ($user) {
                $mar = "Name : " . $user->surname . ' ' . $user->name . "<br>";
                $mar .= "Contact:" . $user->email . ', ' . $user->phone . "<br>";
                $mar .= "Bio:" . $user->gender . ', ' . $user->birthDate . "<br>";
                $mar .= "Tax Code:" . $user->tax_code . "<br>";
                return $mar;
            })
            ->addColumn('date', function ($user) {
                $mar = "Created at : " . $user->created_at . "<br>";
                $mar .= "Last updated:" . $user->updated_at;
                return $mar;
            })
            ->addColumn('kyc_actions', function ($user) {
                // $mar = "<span class= 'badge bg-secondary'>" . ($user->kyc_status) . "</span><br>";
                $mar = "";
                $doc_front_url = asset('uploads/' . $user->doc_front);
                $doc_back_url = asset('uploads/' . $user->doc_back);
                $mar .= "Docment Front: <a href = " . $doc_front_url . " target='_blank'>" . $user->doc_front . "</a><br>";
                $mar .= "Docment Back: <a href = " . $doc_back_url . " target='_blank'>" . $user->doc_back . "</a><br>";

                if ($user->kyc_status == 'pending' || $user->kyc_status == 'rejected') {
                    $url = route('approveWalkInCusKYC');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Approve KYC</button>
                        </form>';
                } else {
                    $url = route('unapproveWalkInCusKYC');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">Unapprove KYC</button>
                        </form>';
                }

                if ($user->user_type == 'dispatcher') {
                    $mar .= '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    see More
                  </button>';
                }
                return $mar;
            })
            ->rawColumns(['kyc_status', 'surname', 'date', 'kyc_actions'])
            ->make(true);
    }

    public function approveWalkInCusKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:walk_in_customers,id'
        ]);

        try {
            WalkInCustomer::where('id', $request->user_id)->update([
                'kyc_status' => 'approved'
            ]);
            return back()->with(['message' => 'User Approved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function unapproveWalkInCusKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:walk_in_customers,id'
        ]);

        try {
            WalkInCustomer::where('id', $request->user_id)->update([
                'kyc_status' => 'rejected'
            ]);
            return back()->with(['message' => 'User Rejected', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function approveAgentKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            Dispatcher::where('user_id', $request->user_id)->update([
                'kyc_status' => 1
            ]);
            return back()->with(['message' => 'Agent Approved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function unapproveAgentKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            Dispatcher::where('user_id', $request->user_id)->update([
                'kyc_status' => 0
            ]);
            return back()->with(['message' => 'Agent Rejected', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function approveMobileUserKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            Kyc::where('user_id', $request->user_id)->update([
                'status' => 'approved'
            ]);
            return back()->with(['message' => 'Mobile User Approved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function unapproveMobileUserKYC(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reason' => 'required'
        ]);

        try {
            Kyc::where('user_id', $request->user_id)->update([
                'status' => 'rejected',
                'rejection_reason' => $request->reason
            ]);
            return back()->with(['message' => 'Mobile User Rejected', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function tax_fetch(Request $request)
    {
        $codiceFiscale = $request->tax_code;
        $cus = WalkInCustomer::where('tax_code', $codiceFiscale)->first();
        if ($cus) {

            $res = [
                'isValid' => true,
                'dob' => $cus->birthDate,
                'gender' => $cus->gender
            ];
            if ($cus) {
                $res['surname'] = $cus->surname;
                $res['name'] = $cus->name;
                $res['doc_type'] = $cus->doc_type;
                $res['doc_num'] = $cus->doc_num;
                $res['kyc_status'] = $cus->kyc_status;
                $res['id'] = $cus->id;
                $res['phone'] = $cus->phone;
                $res['address'] = $cus->address;
                $res['email'] = $cus->email;
            } else {
                $res['surname'] = '';
                $res['name'] = '';
                $res['doc_type'] = '';
                $res['doc_num'] = '';
                $res['kyc_status'] = '';
                $res['id'] = '';
            }
        } else {
            $res = [
                'isValid' => false,
                'dob' => null,
                'gender' => null,
            ];
            $res['surname'] = '';
            $res['name'] = '';
            $res['doc_type'] = '';
            $res['doc_num'] = '';
            $res['kyc_status'] = '';
            $res['id'] = '';
        }
        echo json_encode($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalkInCustomer  $walkInCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(WalkInCustomer $walkInCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalkInCustomer  $walkInCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(WalkInCustomer $walkInCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WalkInCustomer  $walkInCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalkInCustomer $walkInCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalkInCustomer  $walkInCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalkInCustomer $walkInCustomer)
    {
        //
    }
}
