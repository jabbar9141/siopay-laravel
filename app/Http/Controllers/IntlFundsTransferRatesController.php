<?php

namespace App\Http\Controllers;

use App\Models\IntlFundsTransferRates;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class IntlFundsTransferRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.intl_fund_rates.index');
    }

    public function IntlFundsTransferRatesList()
    {
        $rate = IntlFundsTransferRates::where('status', 1)->get();

        return Datatables::of($rate)
            ->addIndexColumn()
            ->addColumn('origin', function ($rate) {
                $mar = $rate->s_country;
                return $mar;
            })
            ->addColumn('destination', function ($rate) {
                $mar = $rate->rx_country;
                return $mar;
            })
            // ->addColumn('origin_currencies', function ($rate) {
            //     $mar = $rate->s_currency;
            //     return $mar;
            // })
            // ->addColumn('detination_currencies', function ($rate) {
            //     $mar = $rate->rx_currency;
            //     return $mar;
            // })
            ->addColumn('commision', function ($rate) {
                $mar =  $rate->commision;
                // $mar .= "<br>Exchange Reate:" . $rate->ex_rate;
                return $mar;
            })
            ->addColumn('calc', function ($rate) {
                $mar = $rate->calc;
                return $mar;
            })
            ->addColumn('limits', function ($rate) {
                $mar = $rate->min_amt . "-" . $rate->max_amt;
                return $mar;
            })
            ->addColumn('action', function ($rate) {
                $edit_url = route('intl_funds_rate.edit', $rate->id);
                $url = route('intl_funds_rate.destroy', $rate->id);
                $btn =   '<div class="d-flex justify-content-between">';
                $btn .= '<a style="white-space: nowrap" href="' . $edit_url . '" class="btn btn-info btn-sm" > Edit</a>';
                $btn .= '<form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "_method" value ="DELETE">
                            <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
                $btn .= '</div>';
                return $btn;
            })
            // ->addColumn('view', function ($rate) {
            //     $url = route('intl_funds_rate.show', $rate->id);
            //     return '<a href="' . $url . '" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> View</a>';
            // })
            ->addColumn('delete', function ($rate) {})
            ->rawColumns(['commision', 'calc', 'origin', 'destination', 'limits', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.intl_fund_rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $request->validate([
            'name' => 'required',
            's_country' => 'required',
            'rx_country' => 'required',
            'calc' => 'required',
            'commision' => 'required',
            'min_amt' => 'required',
            'max_amt' => 'required'

        ]);
        // return $request;
        try {
         
            DB::beginTransaction();
            $l = new IntlFundsTransferRates;
            $l->name = $request->name;
            $l->s_country = $request->s_country;
            $l->rx_country = $request->rx_country;
            $l->s_currency = $request->s_country;
            $l->rx_currency = $request->rx_country;
            $l->calc = $request->calc;
            $l->commision = $request->commision;
            $l->min_amt = $request->min_amt;
            $l->max_amt = $request->max_amt;
            $l->save();
            DB::commit();
            return back()->with(['message' => 'Intl. Funds transfer Route/ Rate Saved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntlFundsTransferRates  $intlFundsTransferRates
     * @return \Illuminate\Http\Response
     */
    public function show(IntlFundsTransferRates $intlFundsTransferRates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IntlFundsTransferRates  $intlFundsTransferRates
     * @return \Illuminate\Http\Response
     */
    public function edit($intlFundsTransferRates)
    {
        $intlFundsTransferRates = IntlFundsTransferRates::find($intlFundsTransferRates);
        // dd($intlFundsTransferRates);
        return view('admin.settings.intl_fund_rates.edit', ['intlFundsTransferRates' => $intlFundsTransferRates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IntlFundsTransferRates  $intlFundsTransferRates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $intlFundsTransferRates)
    {
        try {
            $eUFundsTransferRates = IntlFundsTransferRates::where('id', $intlFundsTransferRates)->first();
            $request->validate([
                'name' => 'required',
                's_country' => 'required',
                'rx_country' => 'required',
                'calc' => 'required',
                'commision' => 'required',
                'min_amt' => 'required',
                'max_amt' => 'required'

            ]);
            DB::beginTransaction();
            $l = $eUFundsTransferRates;
            $l->name = $request->name;
            $l->s_country = $request->s_country;
            $l->rx_country = $request->rx_country;
            $l->s_currency = $request->s_country;
            $l->rx_currency = $request->rx_country;
            $l->calc = $request->calc;
            $l->commision = $request->commision;
            $l->min_amt = $request->min_amt;
            $l->max_amt = $request->max_amt;
            $l->update();
            DB::commit();
            return back()->with(['message' => 'Intl. Funds transfer Route/ Rate Updated', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured" . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntlFundsTransferRates  $intlFundsTransferRates
     * @return \Illuminate\Http\Response
     */
    public function destroy($intlFundsTransferRates)
    {
        try {
            $eUFundsTransferRates = IntlFundsTransferRates::where('id', $intlFundsTransferRates)->update([
                'status' => 0
            ]);
            return back()->with(['message' => 'EU Funds transfer Route/ Rate Deleted', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured" . $e->getMessage());
        }
    }
}
