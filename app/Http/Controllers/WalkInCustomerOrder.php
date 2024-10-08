<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\WalkInCustomer;
use App\Models\OrderPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Mail\PaymentEmail;
use Illuminate\Support\Facades\Mail;

class WalkInCustomerOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dispatcher.orders.index');
    }

    /**
     * datatable for cutomer orders
     */
    public function myOrdersList()
    {
        $orders = Order::where('customer_id', Auth::user()->customer->id)->orderBy('created_at', 'DESC')->get();

        return Datatables::of($orders)
            ->addIndexColumn()
            ->addColumn('status', function ($order) {
                $mar = "<span class= 'badge bg-secondary'>" . $order->status . "</span>";
                return $mar;
            })
            ->addColumn('location', function ($order) {
                $mar = "Origin : " . $order->pickup_location->name . "<br>";
                $mar .= "Destination:" . $order->delivery_location->name;
                return $mar;
            })
            ->addColumn('date', function ($order) {
                $mar = "<b> Tracking ID : " . $order->tracking_id . "</b><br><br>";
                $mar .= "Created at : " . $order->created_at . "<br>";
                $mar .= "Last updated:" . $order->updated_at;
                return $mar;
            })
            ->addColumn('parties', function ($order) {
                $mar = "Sender : " . $order->pickup_name . "<br>";
                $mar .= "Receiver:" . $order->delivery_name;
                return $mar;
            })
            ->addColumn('edit', function ($order) {
                if ($order->status == 'unpaid') {
                    $edit_url = route('orders.edit', $order->id);
                    return '<a href="' . $edit_url . '" class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';
                } else {
                    $edit_url = '#';
                    return '<a href="' . $edit_url . '" class="btn btn-info btn-sm disabled" ><i class="fa fa-pencil"></i> Edit</a>';
                }
            })
            ->addColumn('price', function ($order) {
                if ($order->status == 'unpaid') {
                    $mar = $order->shipping_rate->price . "<br>";
                    $url = route('payment.summary', ['order_id' => $order->id]);
                    $mar .= '<a href="' . $url . '" class="btn btn-info " >$ Pay</a>';
                    return $mar;
                } else {
                    $mar = $order->shipping_rate->price . "<br>";
                    return $mar;
                }
            })
            ->addColumn('view', function ($order) {
                $url = route('orders.show', $order->id);
                return '<a href="' . $url . '" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> View/ Track</a>';
            })
            // ->addColumn('delete', function ($order) {
            //     $url = route('shipping_rates.destroy', $order->id);
            //     return '<form method="POST" action="' . $url . '">
            //                 <input type="hidden" name = "_token" value = ' . csrf_token() . '>
            //                 <input type="hidden" name = "_method" value ="DELETE">
            //                 <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
            //             </form>';
            // })
            ->rawColumns(['status', 'location', 'edit', 'view', 'parties', 'date', 'price'])
            ->make(true);
    }

    public function allOrders()
    {
        return view('admin.orders.index');
    }

    /**
     * datatable for all orders
     */
    public function allOrdersList()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();

        return Datatables::of($orders)
            ->addIndexColumn()
            ->addColumn('status', function ($order) {
                $mar = "<span class= 'badge bg-secondary'>" . $order->status . "</span>";
                return $mar;
            })
            ->addColumn('location', function ($order) {
                $mar = "Origin : " . $order->pickup_location->name . "<br>";
                $mar .= "Destination:" . $order->delivery_location->name;
                return $mar;
            })
            ->addColumn('date', function ($order) {
                $mar = "<b> Tracking ID : " . $order->tracking_id . "</b><br><br>";
                $mar .= "Created at : " . $order->created_at . "<br>";
                $mar .= "Last updated:" . $order->updated_at;
                return $mar;
            })
            ->addColumn('parties', function ($order) {
                $mar = "Sender : " . $order->pickup_name . "<br>";
                $mar .= "Receiver:" . $order->delivery_name;
                return $mar;
            })
            // ->addColumn('edit', function ($order) {
            //     if ($order->status == 'unpaid' || $order->status == 'placed') {
            //         $edit_url = route('orders.edit', $order->id);
            //         return '<a href="' . $edit_url . '" class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';
            //     } else {
            //         $edit_url = '#';
            //         return '<a href="' . $edit_url . '" class="btn btn-info btn-sm disabled" ><i class="fa fa-pencil"></i> Edit</a>';
            //     }
            // })
            ->addColumn('price', function ($order) {
                $mar = $order->shipping_rate->price . "<br>";
                return $mar;
            })
            ->addColumn('view', function ($order) {
                $url = route('orders.show', $order->id);
                return '<a href="' . $url . '" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> View/ Track</a>';
            })
            // ->addColumn('delete', function ($order) {
            //     $url = route('shipping_rates.destroy', $order->id);
            //     return '<form method="POST" action="' . $url . '">
            //                 <input type="hidden" name = "_token" value = ' . csrf_token() . '>
            //                 <input type="hidden" name = "_method" value ="DELETE">
            //                 <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
            //             </form>';
            // })
            ->rawColumns(['status', 'location', 'edit', 'view', 'parties', 'date', 'price'])
            ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('dispatcher.orders.new', ['locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tax_code_' => 'required',
            'surname_' => 'required',
            'name_' => 'required',
            'gender_' => 'required',
            'dob_' => 'required|date',
            'doc_type_' => 'required',
            'doc_num_' => 'required',
            'doc_front_' => 'file|mimes:jpg,jpeg,png,pdf',
            'doc_back_' => 'file|mimes:jpg,jpeg,png,pdf',
            'origin_id' => 'required|numeric|exists:locations,id',
            'dest_id' => 'required|numeric|exists:locations,id',
            'rate' => 'required|numeric|exists:shipping_rates,id',
            'rx_name' => 'required|string',
            'rx_phone' => 'required|string',
            'rx_email' => 'required|string|email',
            'rx_phone_alt' => 'nullable|string',
            'rx_address1' => 'required|string',
            'rx_address2' => 'nullable|string',
            'rx_zip' => 'required|string',
            'rx_city' => 'required|string',
            'rx_state' => 'required|string',
            'rx_country' => 'required|string',
            's_name' => 'required|string',
            's_phone' => 'required|string',
            's_email' => 'required|string|email',
            's_phone_alt' => 'nullable|string',
            's_address1' => 'required|string',
            's_address2' => 'nullable|string',
            's_zip' => 'required|string',
            's_city' => 'required|string',
            's_state' => 'required|string',
            's_country' => 'required|string',
            'r_date' => 'required|string',
            'cond_of_goods' => 'nullable|string',
            'val_of_goods' => 'nullable|string',
            'val_cur' => 'nullable|string',
            'type' => 'array',
            'len' => 'array',
            'width' => 'array',
            'height' => 'array',
            'weight' => 'array',
            'count' => 'array',
            'type.*' => 'required|string',
            'len.*' => 'required',
            'width.*' => 'required',
            'height.*' => 'required',
            'weight.*' => 'required',
            'count.*' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $cus = WalkInCustomer::where('tax_code', $request->tax_code_)->first();
            // dd($);
            if (!$cus) {
                //upload file
                if ($request->hasFile('doc_front_') && $request->hasFile('doc_back_')) {
                    $docFront = $request->file('doc_front_');
                    $docBack = $request->file('doc_back_');

                    // Generate unique filenames for the uploaded files
                    $docFrontFileName = 'doc_front_' . time() . '.' . $docFront->getClientOriginalExtension();
                    $docBackFileName = 'doc_back_' . time() . '.' . $docBack->getClientOriginalExtension();

                    // Move the uploaded files to the public directory
                    $docFront->move(public_path('uploads'), $docFrontFileName);
                    $docBack->move(public_path('uploads'), $docBackFileName);

                    $cus = WalkInCustomer::create([
                        'surname' => $request->surname_,
                        'name' => $request->name_,
                        'birthDate' => $request->dob_,
                        'gender' => $request->gender_,
                        'doc_type' => $request->doc_type_,
                        'doc_num' => $request->doc_num_,
                        'tax_code' => $request->tax_code_,
                        'doc_front' => $docFrontFileName,
                        'doc_back' => $docBackFileName
                    ]);
                } else {
                    $cus = WalkInCustomer::create([
                        'surname' => $request->surname_,
                        'name' => $request->name_,
                        'birthDate' => $request->dob_,
                        'gender' => $request->gender_,
                        'doc_type' => $request->doc_type_,
                        'doc_num' => $request->doc_num_,
                        'tax_code' => $request->tax_code_
                    ]);
                }
            } else {
                //upload file
                if ($request->hasFile('doc_front_') && $request->hasFile('doc_back_')) {
                    $docFront = $request->file('doc_front_');
                    $docBack = $request->file('doc_back_');

                    // Generate unique filenames for the uploaded files
                    $docFrontFileName = 'doc_front_' . time() . '.' . $docFront->getClientOriginalExtension();
                    $docBackFileName = 'doc_back_' . time() . '.' . $docBack->getClientOriginalExtension();

                    // Move the uploaded files to the public directory
                    $docFront->move(public_path('uploads'), $docFrontFileName);
                    $docBack->move(public_path('uploads'), $docBackFileName);

                    $cus = WalkInCustomer::where('tax_code', $request->tax_code_)->update([
                        'surname' => $request->surname_,
                        'name' => $request->name_,
                        'birthDate' => $request->dob_,
                        'gender' => $request->gender_,
                        'doc_type' => $request->doc_type_,
                        'doc_num' => $request->doc_num_,
                        'tax_code' => $request->tax_code_,
                        'doc_front' => $docFrontFileName,
                        'doc_back' => $docBackFileName
                    ]);
                } else {
                    $cus = WalkInCustomer::where('tax_code', $request->tax_code_)->update([
                        'surname' => $request->surname_,
                        'name' => $request->name_,
                        'birthDate' => $request->dob_,
                        'gender' => $request->gender_,
                        'doc_type' => $request->doc_type_,
                        'doc_num' => $request->doc_num_,
                        'tax_code' => $request->tax_code_
                    ]);
                }
            }
            $l = new Order;
            $l->customer_id = Auth::id();
            $l->walk_in_customer_id = $cus->id;
            $l->pickup_location_id = $request->origin_id;
            $l->delivery_location_id = $request->dest_id;
            $l->current_location_id = $request->origin_id;
            $l->shipping_rate_id = $request->rate;
            $l->tracking_id = 'SIO' . time();
            $l->delivery_name = $request->rx_name;
            $l->delivery_phone = $request->rx_phone;
            $l->delivery_email = $request->rx_email;
            $l->delivery_phone_alt = $request->rx_phone_alt ?? null;
            $l->delivery_address1 = $request->rx_address1;
            $l->delivery_address2 = $request->rx_address2 ?? null;
            $l->delivery_zip = $request->rx_zip;
            $l->delivery_city = $request->rx_city;
            $l->delivery_state = $request->rx_state;
            $l->delivery_country = $request->rx_country;
            $l->pickup_name = $request->s_name;
            $l->pickup_phone = $request->s_phone;
            $l->pickup_email = $request->s_email;
            $l->pickup_phone_alt = $request->s_phone_alt ?? null;
            $l->pickup_address1 = $request->s_address1;
            $l->pickup_address2 = $request->s_address2 ?? null;
            $l->pickup_zip = $request->s_zip;
            $l->pickup_city = $request->s_city;
            $l->pickup_state = $request->s_state;
            $l->pickup_country = $request->s_country;
            $l->return_date = $request->r_date;
            $l->cond_of_goods = $request->cond_of_goods;
            $l->val_of_goods = $request->val_of_goods;
            $l->val_cur = $request->val_cur;
            $l->save();
            for ($o = 0; $o < count($request->type); $o++) {
                $item = new OrderPackage;

                $item->order_id = $l->id;
                $item->type = $request->type[$o];
                $item->length = $request->len[$o];
                $item->width = $request->width[$o];
                $item->height = $request->height[$o];
                $item->weight = $request->weight[$o];
                $item->qty = $request->count[$o];
                $item->save();
            }
            DB::commit();
            return redirect()->route('walk_in_customer_order.index')->with(['message' => 'Order saved You can proceed to pay', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dispatcher.orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $dest_str = Location::where('id', $order->delivery_location_id)->first();
        $origin_str = Location::where('id', $order->pickup_location_id)->first();

        $dest_str = $dest_str->postcode . '-' . $dest_str->name . ' [Lat: ' . $dest_str->latitude . ', Long: ' . $dest_str->longitude . ']';
        $origin_str = $origin_str->postcode . '-' . $origin_str->name . ' [Lat: ' . $origin_str->latitude . ', Long: ' . $origin_str->longitude . ']';
        return view('dispatcher.orders.edit', ['order' => $order, 'dest_str' => $dest_str, 'origin_str' => $origin_str]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // dd($request->all());
        $request->validate([
            'origin_id' => 'required|numeric|exists:locations,id',
            'dest_id' => 'required|numeric|exists:locations,id',
            'rate' => 'required|numeric|exists:shipping_rates,id',
            'rx_name' => 'required|string',
            'rx_phone' => 'required|string',
            'rx_email' => 'required|string',
            'rx_phone_alt' => 'nullable|string',
            'rx_address1' => 'required|string',
            'rx_address2' => 'nullable|string',
            'rx_zip' => 'required|string',
            'rx_city' => 'required|string',
            'rx_state' => 'required|string',
            'rx_country' => 'required|string',
            's_name' => 'required|string',
            's_phone' => 'required|string',
            's_email' => 'required|string',
            's_phone_alt' => 'nullable|string',
            's_address1' => 'required|string',
            's_address2' => 'nullable|string',
            's_zip' => 'required|string',
            's_city' => 'required|string',
            's_state' => 'required|string',
            's_country' => 'required|string',
            'r_date' => 'required|string',
            'cond_of_goods' => 'nullable|string',
            'val_of_goods' => 'nullable|string',
            'val_cur' => 'nullable|string',
            'type' => 'array',
            'len' => 'array',
            'width' => 'array',
            'height' => 'array',
            'weight' => 'array',
            'count' => 'array',
            'type.*' => 'required|string',
            'len.*' => 'required|numeric',
            'width.*' => 'required|numeric',
            'height.*' => 'required|numeric',
            'weight.*' => 'required|numeric',
            'count.*' => 'required|numeric'
        ]);
        try {
            DB::beginTransaction();
            $l = $order;
            $l->customer_id = Auth::id();
            $l->pickup_location_id = $request->origin_id;
            $l->delivery_location_id = $request->dest_id;
            $l->current_location_id = $request->origin_id;
            $l->shipping_rate_id = $request->rate;
            $l->tracking_id = 'SIO' . time();
            $l->delivery_name = $request->rx_name;
            $l->delivery_phone = $request->rx_phone;
            $l->delivery_email = $request->rx_email;
            $l->delivery_phone_alt = $request->rx_phone_alt ?? null;
            $l->delivery_address1 = $request->rx_address1;
            $l->delivery_address2 = $request->rx_address2 ?? null;
            $l->delivery_zip = $request->rx_zip;
            $l->delivery_city = $request->rx_city;
            $l->delivery_state = $request->rx_state;
            $l->delivery_country = $request->rx_country;
            $l->pickup_name = $request->s_name;
            $l->pickup_phone = $request->s_phone;
            $l->pickup_email = $request->s_email;
            $l->pickup_phone_alt = $request->s_phone_alt ?? null;
            $l->pickup_address1 = $request->s_address1;
            $l->pickup_address2 = $request->s_address2 ?? null;
            $l->pickup_zip = $request->s_zip;
            $l->pickup_city = $request->s_city;
            $l->pickup_state = $request->s_state;
            $l->pickup_country = $request->s_country;
            $l->return_date = $request->r_date;
            $l->cond_of_goods = $request->cond_of_goods;
            $l->val_of_goods = $request->val_of_goods;
            $l->val_cur = $request->val_cur;
            $l->update();

            //delete all items that are not in submitted item list
            // dd($item_list_str);
            $s = DB::table('order_packages')->whereNotIn('id', $request->item_ids)->delete();
            for ($o = 0; $o < count($request->type); $o++) {
                if ($request->item_ids[$o] == '00') {
                    $item = new OrderPackage;

                    $item->order_id = $l->id;
                    $item->type = $request->type[$o];
                    $item->length = $request->len[$o];
                    $item->width = $request->width[$o];
                    $item->height = $request->height[$o];
                    $item->weight = $request->weight[$o];
                    $item->qty = $request->count[$o];
                    $item->save();
                } else {
                    $item = [];
                    $item['type'] = $request->type[$o];
                    $item['length'] = $request->len[$o];
                    $item['width'] = $request->width[$o];
                    $item['height'] = $request->height[$o];
                    $item['weight'] = $request->weight[$o];
                    $item['qty'] = $request->count[$o];

                    OrderPackage::where('id', $request->item_ids[$o])->update($item);
                }
            }
            DB::commit();
            return back()->with(['message' => 'Order Updated', 'message_type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage())->withInput();
        }
    }

    /**
     * cancel an order
     */
    public function cancelOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id'
        ]);
        try {
            //check if the order belongs to the authenticated user
            $q = Order::where('id', $request->order_id)->where('customer_id', Auth::user()->customer->id)->count();

            if ($q > 0) {
                Order::where('id', $request->order_id)->update([
                    'status' => 'cancelled'
                ]);
                return back()->with(['message' => 'Order Canceled', 'message_type' => 'success']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), ['exception' => $e]);
            return back()->with('message', "An error occured " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
