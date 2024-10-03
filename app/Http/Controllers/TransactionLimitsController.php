<?php

namespace App\Http\Controllers;

use App\Models\TransactionLimits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class TransactionLimitsController extends Controller
{
    public function index()
    {
        return view('admin.settings.transaction_limits.index');
    }

    public function transactionLimitsList()
    {
        $limit = TransactionLimits::all();

        return DataTables::of($limit)
            ->addIndexColumn()
            ->addColumn('action', function ($limit) {
                $edit_url = route('transaction_limits.edit', $limit->id);
                $url = route('transaction_limits.destroy', $limit->id);
                $btn = '<div class="d-flex gap-4 align-items-center">';
                $btn .= '<a href="' . $edit_url . '" class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';
                $btn .= '<form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "_method" value ="DELETE">
                            <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.settings.transaction_limits.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_code' => 'required|string',
                'daily_limit' => 'required|numeric',
                'monthly_limit' => 'required|numeric',
                'Weekly_limit' => 'required|numeric',
            ]);

            $c = TransactionLimits::where('country_code', $request->country_code)->count();

            if ($c > 0) {
                return back()->with(['message' => 'Transaction Limit Exixts for this country: ' . $request->country_code]);
            }

            $l = new TransactionLimits;
            $l->country_code = $request->country_code;
            $l->daily_limit = $request->daily_limit;
            $l->monthly_limit = $request->monthly_limit;
            $l->weekly_limit = $request->Weekly_limit;
            $l->save();
            return back()->with(['message' => 'Transaction Limit Saved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    public function edit($l)
    {
        $l = TransactionLimits::find($l);
        return view('admin.settings.transaction_limits.edit')->with(['limit' => $l]);
    }

    public function update(Request $request, $l)
    {
        try {
            $request->validate([
                'daily_limit' => 'required|numeric',
                'monthly_limit' => 'required|numeric',
            ]);

            $l = TransactionLimits::find($l);
            $l->daily_limit = $request->daily_limit;
            $l->monthly_limit = $request->monthly_limit;
            $l->update();
            return back()->with(['message' => 'Transaction Limit Updated', 'message_type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    public function destroy(Request $request, $l)
    {
        $limit = TransactionLimits::find($l);
        if (!$limit) {
            abort(404);
        }

        try {
            $limit->delete();
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() === 23000) {
                // Foreign key constraint violated
                return back()->with('message', 'Cannot delete resource. There are foreign key constraints in place.');
            } else {
                throw $e;
            }
        }

        return redirect()->back()->with(['message' => 'Transaction Limit deleted', 'message_type' => 'success']);
    }
}
