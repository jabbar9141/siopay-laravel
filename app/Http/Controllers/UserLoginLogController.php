<?php

namespace App\Http\Controllers;

use App\Models\UserLoginLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class UserLoginLogController extends Controller
{
    public function listLogData()
    {
        $logs = UserLoginLog::get();
        return Datatables::of($logs)
            ->addIndexColumn()
            ->editColumn('user_id', function ($log) {
                return $log->user->name . ' (' . $log->user->email . ')';
            })
            ->make(true);
    }
}
