<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ShippingRate;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ShippingRateController extends Controller
{
    public function __construct()
    {
        AdminController::canDispatch();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.shipping_rates.index');
    }

    /**
     * ajax function for locationList
     */
    public function shippingRatesList()
    {
        $rate = ShippingRate::orderBy('name', 'ASC')->get();

        return Datatables::of($rate)
            ->addIndexColumn()
            ->addColumn('weights', function ($rate) {
                $mar = "Min : $rate->weight_start<br>";
                $mar .= "Max: $rate->weight_end";
                return $mar;
            })
            ->addColumn('location', function ($rate) {
                $mar = "Origin : " . $rate->origin->name . "<br>";
                $mar .= "Destination:" . $rate->destination->name;
                return $mar;
            })
            ->addColumn('max_dimensions', function ($rate) {
                $mar = "Width : " . $rate->width . "<br>";
                $mar .= "Height:" . $rate->height . "<br>";
                $mar .= "Length:" . $rate->length;
                return $mar;
            })
            ->addColumn('edit', function ($rate) {
                $edit_url = route('shipping_rates.edit', $rate->id);
                return '<a href="' . $edit_url . '" class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';
            })
            ->addColumn('view', function ($rate) {
                $url = route('shipping_rates.show', $rate->id);
                return '<a href="' . $url . '" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> View</a>';
            })
            ->addColumn('delete', function ($rate) {
                $url = route('shipping_rates.destroy', $rate->id);
                return '<form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "_method" value ="DELETE">
                            <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            })
            ->rawColumns(['weights', 'location', 'edit', 'view', 'delete', 'max_dimensions'])
            ->make(true);
    }

    /**
     * ajax fetch
     */
    public function rates_fetch(Request $request)
    {
        $request->validate([
            'origin' => 'required|numeric',
            'dest' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'count' => 'required|numeric'
        ]);

        $rates = ShippingRate::where('origin_id', $request->origin)
            ->where('destination_id', $request->dest)
            ->where('weight_start', '<=', $request->weight)
            ->where('weight_end', '>=', $request->weight)
            ->where('length', '>=', $request->length)
            ->where('width', '>=', $request->width)
            ->where('height', '>=', $request->height)
            ->with(['destination', 'origin'])
            ->limit(20)
            ->get();

        return response()->json($rates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('admin.settings.shipping_rates.create')->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'origin' => 'required|exists:locations,id',
                'dest' => 'required|exists:locations,id',
                'min_weight' => 'required|numeric|',
                'max_weight' => 'required|numeric',
                'width' => 'required|numeric',
                'len' => 'required|numeric',
                'height' => 'required|numeric',
                'pickup_cost_per_km' => 'required|numeric',
                'delivery_cost_per_km' => 'required|numeric',
                'price' => 'required|numeric',
                'desc' => 'nullable|string'
            ]);
            DB::beginTransaction();
            $l = new ShippingRate;
            $l->name = $request->name;
            $l->origin_id = $request->origin;
            $l->destination_id = $request->dest;
            $l->weight_start = $request->min_weight;
            $l->weight_end = $request->max_weight;
            $l->price = $request->price;
            $l->height = $request->height;
            $l->width = $request->width;
            $l->length = $request->len;
            $l->pickup_cost_per_km = $request->pickup_cost_per_km;
            $l->delivery_cost_per_km = $request->delivery_cost_per_km;
            $l->desc = $request->desc ?? '';
            $l->save();
            DB::commit();
            return back()->with(['message' => 'Shipping Route/ Rate Saved', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingRate $shippingRate)
    {
        return view('admin.settings.shipping_rates.show')->with('rate', $shippingRate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingRate $shippingRate)
    {
        $locations = Location::all();
        
        return view('admin.settings.shipping_rates.edit', ['shippingRate' => $shippingRate, 'locations' => $locations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingRate $shippingRate)
    {
        try {
            $request->validate([
                'name' => 'required',
                'origin' => 'required|exists:locations,id',
                'dest' => 'required|exists:locations,id',
                'min_weight' => 'required|numeric|',
                'max_weight' => 'required|numeric',
                'width' => 'required|numeric',
                'len' => 'required|numeric',
                'height' => 'required|numeric',
                'pickup_cost_per_km' => 'required|numeric',
                'delivery_cost_per_km' => 'required|numeric',
                'price' => 'required|numeric',
                'desc' => 'nullable|string'
            ]);
            DB::beginTransaction();
            $l = $shippingRate;
            $l->name = $request->name;
            $l->origin_id = $request->origin;
            $l->destination_id = $request->dest;
            $l->weight_start = $request->min_weight;
            $l->weight_end = $request->max_weight;
            $l->price = $request->price;
            $l->height = $request->height;
            $l->pickup_cost_per_km = $request->pickup_cost_per_km;
            $l->delivery_cost_per_km = $request->delivery_cost_per_km;
            $l->width = $request->width;
            $l->length = $request->len;
            $l->desc = $request->desc ?? '';
            $l->update();
            DB::commit();
            return back()->with(['message' => 'Shipping Route/ Rate Updated', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingRate  $shippingRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingRate $shippingRate)
    {
        if (!$shippingRate) {
            abort(404);
        }

        try {
            $shippingRate->delete();
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() === 23000) {
                // Foreign key constraint violated
                return back()->with('message', 'Cannot delete resource. There are foreign key constraints in place.');
            } else {
                throw $e;
            }
        }

        return redirect()->route('resource.index')->with(['message' => 'Shipping Rate deleted', 'message_type' => 'success']);
    }
}
