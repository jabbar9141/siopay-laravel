<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\TransactionLimits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public static function canAdmin()
    {
        if (Auth::user()) {
            if (Auth::user()->user_type != 'admin') {
                abort(402, 'You do not have access to this functionality');
            }
        }
    }
    public static function canDispatch()
    {
        // dd(request()->user());
        if (Auth::user()) {
            if (Auth::user()->user_type != 'admin' && Auth::user()->user_type != 'dispatcher') {
                return abort(402, 'You do not have access to this functionality');
            }
        }
    }

    public function allUsers()
    {
        return view('admin.users.index');
    }

    /**
     * datatable for all orders
     */
    public function allUsersList()
    {
        $query = User::query();
        if (Auth::user()->user_type == 'kyc_manager') {
            $query->where('kyc_manager_id', auth()->user()->id);
        }
        if (Auth::user()->user_type == 'account_manager') {
            $query->where('account_manager_id', auth()->user()->id);
        }
        $users = $query->where('id', '!=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                $mar = "<span class='badge " . (($user->blocked == 1) ? 'bg-danger' : 'bg-secondary') . "'>" . (($user->blocked == 1) ? 'Blocked' : 'Approved') . "</span><br>";
                return $mar;
            })
            ->editColumn('user_unique_id', function ($user) {
                if ($user->user_unique_id) {
                    return $user->user_unique_id;
                } else {
                    if ($user->user_type == 'agent') {
                        return "SIOA000" . $user->id;
                    } else {
                        return "SIOU000" . $user->id;
                    }
                }
            })
            ->addColumn('user_name', function ($user) {
                $image = '<img src="' . asset('admin_assets/assets/images/profile/user-1.jpg') . '" alt="" class="rounded-circle" style="width: 35px;height:35px;">';
                if ($user->photo) {
                    $image = '<img src="' . asset($user->photo) . '" alt=""  class="rounded-circle" style="width: 35px;height:35px;">';
                }
                $user_name = $user->name;
                $user_email = $user->email;
                $design = '<div class="d-flex align-items-center">
                    <div class="position-relative">
                       ' . $image . '
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">' . $user_name . '</h6>
                        <small class="text-muted">' . $user_email . '</small>
                    </div>
                </div>';
                return $design;
            })
            ->addColumn('date', function ($user) {
                $mar = Carbon::parse($user->created_at)->format('F j, Y');
                return $mar;
            })
            ->addColumn('user_type', function ($user) {
                $mar = "<span class='badge bg-primary'>" . Str::headline($user->user_type) . "</span><br>";
                return $mar;
            })
            ->addColumn('action', function ($user) {
                $blockUrl = route('unblockUser', ['user_id' => $user->id]);
                $unBlockUrl = route('blockUser', ['user_id' => $user->id]);

                $mar = '<div class="d-flex align-items-center">';

                if ($user->blocked == 1) {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $unBlockUrl . '" class="btn btn-sm btn-primary ms-2 text-nowrap" >Un-Block</a>';
                    }
                } else {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $blockUrl . '" class="btn btn-sm btn-danger ms-2" >Block</a>';
                    }
                }
                return $mar . '</div>';
            })
            ->rawColumns(['user_name', 'user_unique_id', 'status', 'date', 'user_type', 'action'])
            ->make(true);
    }

    public function allAgentList()
    {
        $query = User::query();
        if (Auth::user()->user_type == 'kyc_manager') {
            $query->where('kyc_manager_id', auth()->user()->id);
        }
        if (Auth::user()->user_type == 'account_manager') {
            $query->where('account_manager_id', auth()->user()->id);
        }
        $users = $query->where('user_type', 'agent')->orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                $mar = "<span class='badge " . (($user->blocked == 1) ? 'bg-danger' : 'bg-secondary') . "'>" . (($user->blocked == 1) ? 'Blocked' : 'Approved') . "</span><br>";
                return $mar;
            })
            ->editColumn('user_unique_id', function ($user) {
                return $user->user_unique_id;
            })
            ->addColumn('user_name', function ($user) {
                $image = '<img src="' . asset('admin_assets/assets/images/profile/user-1.jpg') . '" alt="" class="rounded-circle" style="width: 35px;height:35px;">';
                if ($user->photo) {
                    $image = '<img src="' . asset($user->photo) . '" alt=""  class="rounded-circle" style="width: 35px;height:35px;">';
                }
                $user_name = $user->name;
                $user_email = $user->email;
                $design = '<div class="d-flex align-items-center">
                    <div class="position-relative">
                       ' . $image . '
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">' . $user_name . '</h6>
                        <small class="text-muted">' . $user_email . '</small>
                    </div>
                </div>';
                return $design;
            })
            ->addColumn('date', function ($user) {
                $mar = Carbon::parse($user->created_at)->format('F j, Y');
                return $mar;
            })
            ->addColumn('action', function ($user) {
                $blockUrl = route('unblockUser', ['user_id' => $user->id]);
                $unBlockUrl = route('blockUser', ['user_id' => $user->id]);
                $mar = '<div class="d-flex align-items-center">';
                if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'kyc_manager' || Auth::user()->user_type == 'account_manager') {
                    $mar .= '<a href="' . route('agent.editSitting', $user->id) . '" class="btn btn-sm btn-primary rounded" >Profile</a>';
                }
                // if (Auth::user()->user_type == "admin") {
                //     $mar .= '<a href="#" class="btn btn-sm btn-danger ms-2" ><i class="fa-solid fa-trash"></i></a>';
                // }
                if ($user->blocked == 1) {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $unBlockUrl . '" class="btn btn-sm btn-primary ms-2 text-nowrap" >Un-Block</a>';
                    }
                } else {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $blockUrl . '" class="btn btn-sm btn-danger ms-2 text-nowrap" >Block</a>';
                    }
                }
                return $mar . '</div>';
            })
            ->rawColumns(['user_name', 'user_unique_id', 'status', 'date', 'action'])
            ->make(true);
    }

    public function allMobileUserList()
    {
        $query = User::query();
        if (Auth::user()->user_type == 'kyc_manager') {
            $query->where('kyc_manager_id', auth()->user()->id);
        }
        if (Auth::user()->user_type == 'account_manager') {
            $query->where('account_manager_id', auth()->user()->id);
        }
        $users = $query->where('user_type', 'mobile')->orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                $mar = "<span class='badge " . (($user->blocked == 1) ? 'bg-danger' : 'bg-secondary') . "'>" . (($user->blocked == 1) ? 'Blocked' : 'Approved') . "</span><br>";
                return $mar;
            })
            ->editColumn('user_unique_id', function ($user) {
                return $user->user_unique_id ?? 'SIOU000' . $user->id;
            })
            ->addColumn('user_name', function ($user) {
                $image = '<img src="' . asset('admin_assets/assets/images/profile/user-1.jpg') . '" alt="" class="rounded-circle" style="width: 35px;height:35px;">';
                if ($user->photo) {
                    $image = '<img src="' . asset($user->photo) . '" alt=""  class="rounded-circle" style="width: 35px;height:35px;">';
                }
                $user_name = $user->name;
                $user_email = $user->email;
                $design = '<div class="d-flex align-items-center">
                    <div class="position-relative">
                       ' . $image . '
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">' . $user_name . '</h6>
                        <small class="text-muted">' . $user_email . '</small>
                    </div>
                </div>';
                return $design;
            })
            ->addColumn('date', function ($user) {
                $mar = Carbon::parse($user->created_at)->format('F j, Y');
                return $mar;
            })
            ->addColumn('action', function ($user) {
                $blockUrl = route('unblockUser', ['user_id' => $user->id]);
                $unBlockUrl = route('blockUser', ['user_id' => $user->id]);
                $mar = '<div class="d-flex align-items-center">';
                if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'kyc_manager' || Auth::user()->user_type == 'account_manager') {
                    $mar .= '<a href="' . route('editUser', $user->id) . '" class="btn btn-sm btn-primary rounded" >Profile</a>';
                }
                if ($user->blocked == 1) {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $unBlockUrl . '" class="btn btn-sm btn-primary ms-2 text-nowrap" >Un-Block</a>';
                    }
                } else {
                    if (Auth::user()->user_type == "admin" || Auth::user()->user_type == 'kyc_manager') {
                        $mar .= '<a href="' . $blockUrl . '" class="btn btn-sm btn-danger ms-2" >Block</a>';
                    }
                }
                // if (Auth::user()->user_type == "admin") {
                //     $mar .= '<a href="#" class="btn btn-sm btn-danger ms-2" ><i class="fa-solid fa-trash"></i></a>';
                // }
                return $mar . '</div>';
            })
            ->rawColumns(['user_name', 'user_unique_id', 'status', 'date', 'action'])
            ->make(true);
    }

    public function allKycManagerList()
    {
        $users = User::where('id', '!=', Auth::user()->id)->where('user_type', 'kyc_manager')->orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                $mar = "<span class='badge " . (($user->blocked == 1) ? 'bg-danger' : 'bg-secondary') . "'>" . (($user->blocked == 1) ? 'Blocked' : 'Approved') . "</span><br>";
                return $mar;
            })
            ->editColumn('user_unique_id', function ($user) {
                if ($user->user_unique_id) {
                    return $user->user_unique_id;
                } else {
                    if ($user->user_type == 'agent') {
                        return "SIOA000" . $user->id;
                    } else {
                        return "SIOU000" . $user->id;
                    }
                }
            })
            ->addColumn('user_name', function ($user) {
                $image = '<img src="' . asset('admin_assets/assets/images/profile/user-1.jpg') . '" alt="" class="rounded-circle" style="width: 35px;height:35px;">';
                if ($user->photo) {
                    $image = '<img src="' . asset($user->photo) . '" alt=""  class="rounded-circle" style="width: 35px;height:35px;">';
                }
                $user_name = $user->name;
                $user_email = $user->email;
                $design = '<div class="d-flex align-items-center">
                    <div class="position-relative">
                       ' . $image . '
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">' . $user_name . '</h6>
                        <small class="text-muted">' . $user_email . '</small>
                    </div>
                </div>';
                return $design;
            })
            ->addColumn('date', function ($user) {
                $mar = Carbon::parse($user->created_at)->format('F j, Y');
                return $mar;
            })
            ->addColumn('user_type', function ($user) {
                $mar = "<span class='badge bg-primary'>" . ucfirst($user->user_type) . "</span><br>";
                return $mar;
            })
            ->addColumn('action', function ($user) {
                $blockUrl = route('unblockUser', ['user_id' => $user->id]);
                $unBlockUrl = route('blockUser', ['user_id' => $user->id]);

                $mar = '<div class="d-flex align-items-center">';

                if ($user->blocked == 1) {
                    if (Auth::user()->user_type == "admin") {
                        $mar .= '<a href="' . $unBlockUrl . '" class="btn btn-sm btn-primary ms-2" >Un-Block</a>';
                    }
                } else {
                    if (Auth::user()->user_type == "admin") {
                        $mar .= '<a href="' . $blockUrl . '" class="btn btn-sm btn-danger ms-2" >Block</a>';
                    }
                }
                $mar .= '<a href="' . route('editUser', $user->id) . '" class="btn btn-sm btn-primary ms-2" >Edit</a>';
                return $mar . '</div>';
            })
            ->rawColumns(['user_name', 'user_unique_id', 'status', 'date', 'user_type', 'action'])
            ->make(true);
    }

    public function allAccountManagerList()
    {
        $users = User::where('id', '!=', Auth::user()->id)->where('user_type', 'account_manager')->orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                $mar = "<span class='badge " . (($user->blocked == 1) ? 'bg-danger' : 'bg-secondary') . "'>" . (($user->blocked == 1) ? 'Blocked' : 'Approved') . "</span><br>";
                return $mar;
            })
            ->editColumn('user_unique_id', function ($user) {
                if ($user->user_unique_id) {
                    return $user->user_unique_id;
                } else {
                    if ($user->user_type == 'agent') {
                        return "SIOA000" . $user->id;
                    } else {
                        return "SIOU000" . $user->id;
                    }
                }
            })
            ->addColumn('user_name', function ($user) {
                $image = '<img src="' . asset('admin_assets/assets/images/profile/user-1.jpg') . '" alt="" class="rounded-circle" style="width: 35px;height:35px;">';
                if ($user->photo) {
                    $image = '<img src="' . asset($user->photo) . '" alt=""  class="rounded-circle" style="width: 35px;height:35px;">';
                }
                $user_name = $user->name;
                $user_email = $user->email;
                $design = '<div class="d-flex align-items-center">
                    <div class="position-relative">
                       ' . $image . '
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">' . $user_name . '</h6>
                        <small class="text-muted">' . $user_email . '</small>
                    </div>
                </div>';
                return $design;
            })
            ->addColumn('date', function ($user) {
                $mar = Carbon::parse($user->created_at)->format('F j, Y');
                return $mar;
            })
            ->addColumn('user_type', function ($user) {
                $mar = "<span class='badge bg-primary'>" . ucfirst($user->user_type) . "</span><br>";
                return $mar;
            })
            ->addColumn('action', function ($user) {
                $blockUrl = route('unblockUser', ['user_id' => $user->id]);
                $unBlockUrl = route('blockUser', ['user_id' => $user->id]);

                $mar = '<div class="d-flex align-items-center">';

                if ($user->blocked == 1) {
                    if (Auth::user()->user_type == "admin") {
                        $mar .= '<a href="' . $unBlockUrl . '" class="btn btn-sm btn-primary ms-2" >Un-Block</a>';
                    }
                } else {
                    if (Auth::user()->user_type == "admin") {
                        $mar .= '<a href="' . $blockUrl . '" class="btn btn-sm btn-danger ms-2" >Block</a>';
                    }
                }
                $mar .= '<a href="' . route('editUser', $user->id) . '" class="btn btn-sm btn-primary ms-2" >Edit</a>';
                return $mar . '</div>';
            })
            ->rawColumns(['user_name', 'user_unique_id', 'status', 'date', 'user_type', 'action'])
            ->make(true);
    }


    public function allTransectionList()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('user_type', function ($user) {
                $mar = "<span class= 'badge bg-secondary'>" . $user->user_type . "</span><br>";

                if ($user->user_type == 'admin') {
                    $url = route('makeUser');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make User</button>
                        </form>';

                    $url = route('makeDispatcher');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                                <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                                <input type="hidden" name = "user_id" value ="' . $user->id . '">
                                <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make Dispatcher</button>
                            </form>';
                } else if ($user->user_type == 'user') {
                    $url = route('makeAdmin');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make Admin</button>
                        </form>';

                    $url = route('makeDispatcher');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                                <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                                <input type="hidden" name = "user_id" value ="' . $user->id . '">
                                <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make Dispatcher</button>
                            </form>';
                } else {
                    $url = route('makeAdmin');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make Admin</button>
                        </form>';

                    $url = route('makeUser');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                                <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                                <input type="hidden" name = "user_id" value ="' . $user->id . '">
                                <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Make User</button>
                            </form>';
                }
                return $mar;
            })
            ->editColumn('email', function ($user) {
                $mar = "Name : " . $user->name . "<br>";
                $mar .= "Email:" . $user->email;
                return $mar;
            })
            ->addColumn('date', function ($user) {
                $mar = "Created at : " . $user->created_at . "<br>";
                $mar .= "Last updated:" . $user->updated_at;
                return $mar;
            })
            ->addColumn('limits', function ($user) {
                $limit = TransactionLimits::where('country_code', $user->country_code)->first();
                $mar = '';
                // if (!$limit) {
                //     //TODO:implement default limits
                //     $limit->daily_limit = 999;
                //     $limit->monthly_limit = 9999;
                // }

                $totalToday = Transaction::totalAmountForToday($user->id);
                $totalLast30Days = Transaction::totalAmountForLast30Days($user->id);

                $mar = "Monthly Limit Avail.(&euro;) : " . number_format($limit?->monthly_limit ?? 9999 - $totalLast30Days, 2) . "<br>";
                $mar .= "Daily Limit Avail.(&euro;):" . number_format($limit?->daily_limit ?? 999 - $totalToday, 2);
                return $mar;
            })
            ->editColumn('blocked', function ($user) {
                $mar = "<span class= 'badge bg-secondary'>" . (($user->blocked == 1) ? 'Blocked' : 'Active') . "</span><br>";

                if ($user->blocked == 1) {
                    $url = route('unblockUser');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-primary">Unblock</button>
                        </form>';
                } else {
                    $url = route('blockUser');
                    $mar .= '<br><form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "user_id" value ="' . $user->id . '">
                            <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">Block</button>
                        </form>';
                }
                return $mar;
            })
            // ->addColumn('delete', function ($user) {
            //
            // })
            ->rawColumns(['user_type', 'email', 'date', 'blocked', 'limits'])
            ->make(true);
    }

    public function unblockUser(Request $request)
    {
        try {
            User::where('id', $request->user_id)->update([
                'blocked' => false
            ]);
            return back()->with(['message' => 'User Unblocked', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function blockUser(Request $request)
    {
        try {
            User::where('id', $request->user_id)->update([
                'blocked' => true
            ]);
            return back()->with(['message' => 'User Blocked', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function makeAdmin(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            User::where('id', $request->user_id)->update([
                'user_type' => 'admin'
            ]);
            return back()->with(['message' => 'User Made Admin', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function makeDispatcher(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            User::where('id', $request->user_id)->update([
                'user_type' => 'dispatcher'
            ]);
            return back()->with(['message' => 'User Made Dispatcher', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function makeUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            User::where('id', $request->user_id)->update([
                'user_type' => 'user'
            ]);
            return back()->with(['message' => 'User Made User', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function adminReports()
    {
        $rep = [];
        $rep['total_users'] = User::count();
        $rep['total_blocked_users'] = User::where('blocked', true)->count();

        $rep['total_orders'] = Order::count();
        $rep['total_unpaid_orders'] = Order::where('status', 'unpaid')->count();
        $rep['totsl_paid_orders'] = Order::where('status', '!=', 'unpaid')->count();
        $rep['total_in_transit_orders'] = Order::where('status', 'in_transit')->count();
        $rep['total_delivered_orders'] = Order::where('status', 'delivered')->count();
        $rep['total_cancelled_orders'] = Order::where('status', 'cancelled')->count();

        $rep['total_payments'] = Payment::where('status', 'done')->count();
        $rep['total_payments_pending'] = Payment::where('status', 'pending')->count();
        $rep['total_payments_failed'] = Payment::where('status', 'failed')->count();
        $rep['total_payments_value'] = Payment::where('status', 'done')->sum('amt_paid');

        return $rep;
    }

    public function assignKycManager(Request $request, $user_id)
    {
        $request->validate([
            'kyc_manager_id' => 'required'
        ]);

        try {
            User::where('id', $user_id)->update([
                'kyc_manager_id' => $request->kyc_manager_id
            ]);
            return back()->with(['message' => 'KYC Manager Assign Successfully', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function assignAccountManager(Request $request, $user_id)
    {
        $request->validate([
            'account_manager_id' => 'required'
        ]);

        try {
            User::where('id', $user_id)->update([
                'account_manager_id' => $request->account_manager_id
            ]);
            return back()->with(['message' => 'Account Manager Assign Successfully', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function uploadProfileImage(Request $request, $user_id)
    {
        $request->validate([
            'photo' => 'required'
        ]);
        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = 'user_profile_' . rand(100000, 999999) . '.' . $photo->extension();
                $destinationDirectory = public_path('uploads/profile');
                if (!file_exists($destinationDirectory)) {
                    mkdir($destinationDirectory, 0755, true);
                }
                $photo->move($destinationDirectory, $filename);
                User::where('id', $user_id)->update(['photo' => 'uploads/profile/' . $filename]);
                return back()->with(['message' => 'Account Manager Assign Successfully', 'message_type' => 'success']);
            }
            return back()->with('message', "Something went wrong");
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {

        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'country_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'phone' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'tax_code' => 'required',
            'address' => 'required',
        ]);

        // return $request;
        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = 'user_profile_' . rand(100000, 999999) . '.' . $photo->extension();
                $destinationDirectory = public_path('uploads/profile');
                if (!file_exists($destinationDirectory)) {
                    mkdir($destinationDirectory, 0755, true);
                }
                $photo->move($destinationDirectory, $filename);
            }

            $user = User::create([
                'surname' => $request->surname,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'country' => $request->country_id,
                'city_id' => $request->city_id,
                'blocked' => false,
                'phone' => $request->phone,
                'photo' => 'uploads/profile/' . $filename,
                'gender' => $request->gender,
                'date_of_birth' => Carbon::parse($request->date_of_birth),
                'tax_code' => $request->tax_code,
                'address' => $request->address,
            ]);

            $user->user_unique_id = "SIOU000" . $user->id;
            $user->save();

            Mail::to($user->email)->send(new SignUpEmail($user));
            return back()->with(['message' => 'User Created Succefully!', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $currency_exchange_rates = null;
        $kycManagers = User::where('user_type', 'kyc_manager')->where('blocked', false)->orderBy('name')->get();
        $accountManagers = User::where('user_type', 'account_manager')->where('blocked', false)->orderBy('name')->get();
        return view('admin.users.edit', compact('user', 'currency_exchange_rates', 'kycManagers', 'accountManagers'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'tax_code' => 'required',
            'address' => 'required',
        ]);

        $user  = User::find($id);
        try {
            $user->update([
                'surname' => $request->surname,
                'name' => $request->name,
                'user_type' => $request->user_type,
                'country' => $request->country_id,
                'city_id' => $request->city_id,
                'blocked' => false,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'date_of_birth' => Carbon::parse($request->date_of_birth),
                'tax_code' => $request->tax_code,
                'address' => $request->address,
            ]);
            return back()->with(['message' => 'User Information Update Successfully!', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * hompage for the various admin settings
     */

    public function admin_settings()
    {
        return view('admin.settings.index');
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
