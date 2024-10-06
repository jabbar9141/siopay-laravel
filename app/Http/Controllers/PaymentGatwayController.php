<?php

namespace App\Http\Controllers;

use App\Models\PaymentGatway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class PaymentGatwayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list(Request $request)
    {

        $payment_gatways = PaymentGatway::get();
        return DataTables::of($payment_gatways)
            ->addIndexColumn()
            ->addColumn('account_mode', function ($row) {
                return $row->account_mode;
            })
            ->addColumn('public_key', function ($row) {
                return str_pad(substr($row->public_key, 0, 12), 15, '.', STR_PAD_RIGHT);
            })
            ->addColumn('secret_key', function ($row) {
                return str_pad(substr($row->secret_key, 0, 12), 15, '.', STR_PAD_RIGHT);
            })
            ->addColumn('account_name', function ($row) {
                return $row->account_name;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $edit_url = route('payments_gatway.edit', $row->id);
                $url = route('payments_gatway.destroy', $row->id);

                $btn .= '<div class="d-flex ps-3 gap-4">';
                $btn .= '<a style="white-space: nowrap" href="' . $edit_url . '" class="btn btn-info rounded-1 btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';

                $btn .= '<form method="POST" action="' . $url . '">
                                <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                                <input type="hidden" name = "_method" value ="DELETE">
                                <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                            </form>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.payment_gatway.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();

        $request->validate([
            'account_mode' => 'required',
            'public_key' => 'required',
            'secret_key' => 'required',
            'account_name' => 'required',
        ]);

        try {
            PaymentGatway::create([
                'account_mode' => $request->account_mode,
                'public_key' => $request->public_key,
                'secret_key' => $request->secret_key,
                'account_name' => $request->account_name,
            ]);

            return redirect()->route('setting.tabs')->with(['message' => 'Add Successfully', 'success' => true]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return back()->with(['message' => 'An error Auccured' . $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_gatway = PaymentGatway::find($id);

        if ($payment_gatway) {
            return view('admin.settings.payment_gatway.edit')->with(['payment_gatway' => $payment_gatway]);
        } else {
            return back()->with(['message' => 'An error Auccured']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'account_mode' => 'required',
            'public_key' => 'required',
            'secret_key' => 'required',
            'account_name' => 'required',
        ]);

        try {
            PaymentGatway::where('id', $id)->update([
                'account_mode' => $request->account_mode,
                'public_key' => $request->public_key,
                'secret_key' => $request->secret_key,
                'account_name' => $request->account_name,
            ]);
            return redirect()->route('setting.tabs')->with(['message' => 'Updated Successfully', 'success' => true]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return back()->with(['message' => 'An error Auccured' . $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_gatway = PaymentGatway::find($id);

        if ($payment_gatway) {
            $payment_gatway->delete();
            return redirect()->route('setting.tabs')->with(['message' => 'Deleted Successfully', 'success' => true]);
        } else {
            return back()->with(['message' => 'Record Does not exist']);
        }
    }
}
