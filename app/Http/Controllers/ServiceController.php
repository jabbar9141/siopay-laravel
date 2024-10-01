<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpseclib3\File\ASN1\Maps\Extensions;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.services.index');
    }

    public function list()
    {
        $services = Service::where('status', true)->get();

        return DataTables::of($services)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('service_charges', function ($row) {
                return $row->service_charges;
            })->addColumn('status', function ($row) {
                $badge = '';
                if ($row->status) {
                    $badge .= '<span class="badge rounded bg-info">Active</span>';
                } else {
                    $badge .= '<span class="badge rounded bg-info">InActive</span>';
                }
                return $badge;
            })->addColumn('edit', function ($rate) {
                $edit_url = route('service.edit', $rate->id);
                return '<a href="' . $edit_url . '" class="btn btn-info btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';
            })
            ->addColumn('delete', function ($rate) {
                $url = route('service.destroy', $rate->id);
                return '<form method="POST" action="' . $url . '">
                            <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                            <input type="hidden" name = "_method" value ="DELETE">
                            <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            })
            ->rawColumns(['status', 'edit', 'delete'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.services.create');
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
            'name' => 'required',
            'logo' => 'required',
            'service_charges' => 'required',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $serviceLogo = $request->file('logo');
                $serviceLogoName = 'service_logo' . '_' . rand(100000, 9999999) . '.' . $serviceLogo->extension();
                $serviceLogo->move(public_path('uploads/services/'), $serviceLogoName);
            }

            Service::create([
                'name' => $request->name,
                'service_charges' => $request->service_charges,
                'logo' => 'uploads/services/' . $serviceLogoName
            ]);

            return redirect()->route('service.list')->with(['message' => 'add Successfully.', 'message_type' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return back()->with(['message', "An error occured " . $th->getMessage()]);
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
        $service = Service::find($id);
        return view('admin.settings.services.edit', ['service' => $service]);
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
            'name' => 'required',
            'logo' => 'required',
            'service_charges' => 'required',
        ]);

        try {
            $service = Service::find($id);

            if ($request->hasFile('logo')) {
                $serviceLogo = $request->file('logo');
                $serviceLogoName = 'service_logo' . '_' . rand(100000, 9999999) . '.' . $serviceLogo->extension();
                $serviceLogo->move(public_path('uploads/services/'), $serviceLogoName);
            }

            if ($service->logo) {
                $oldLogoPath = public_path($service->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            $service->name = $request->name;
            $service->service_charges = $request->service_charges;
            $service->logo = 'uploads/services/' . $serviceLogoName;
            $service->save();


            return redirect()->route('service.list')->with(['message' => 'Updated Successfully.', 'message_type' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return back()->with(['message', "An error occured " . $th->getMessage()]);
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
        $service = Service::find($id);
        if ($service->logo) {
            $oldLogoPath = public_path($service->logo);
            if (file_exists($oldLogoPath)) {
                unlink($oldLogoPath);
            }
        }
        $service->delete();
        return redirect()->route('service.list')->with(['message' => 'Deleted Successfully.', 'message_type' => 'success']);
    }


    public function setting()
    {
        return view('admin.settings.setting_tabs');
    }
}
