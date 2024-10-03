<?php

namespace App\Http\Controllers;

use App\Models\Smtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SmtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.smtp.index');
    }

    public function list() {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.smtp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $request->validate([
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_encryption' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_from_addressed' => 'required',
        ]);

        try {
            Smtp::create([
                'mail_host' => $request->name,
                'mail_port' => $request->mail_host,
                'mail_encreption' => $request->service_charges,
                'mail_username' => $request->service_charges,
                'mail_password' => $request->service_charges,
                'mail_from_addressed' => $request->service_charges,
            ]);

            return redirect()->route('setting.tabs')->with(['message' => 'add Successfully.', 'message_type' => 'success']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
