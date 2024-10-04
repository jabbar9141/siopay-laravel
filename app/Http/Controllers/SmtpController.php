<?php

namespace App\Http\Controllers;

use App\Models\Smtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

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

    public function list(Request $request)
    {

        // if ($request->ajax()) {
        $smtps = Smtp::get();

        return DataTables::of($smtps)
            ->addIndexColumn()
            ->addColumn('mail_host', function ($row) {
                return $row->mail_host;
            })
            ->addColumn('mail_port', function ($row) {
                return $row->mail_port;
            })
            ->addColumn('mail_encreption', function ($row) {
                return $row->mail_encreption;
            })
            ->addColumn('mail_username', function ($row) {
                return $row->mail_username;
            })
            ->addColumn('mail_password', function ($row) {
                return $row->mail_password;
            })
            ->addColumn('mail_from_addressed', function ($row) {
                return $row->mail_from_addressed;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $edit_url = route('smtp.edit', $row->id);
                $url = route('smtp.destroy', $row->id);

                $btn .= '<div class="d-flex ps-3 gap-4">';
                $btn .= '<a href="' . $edit_url . '" class="btn btn-info rounded-1 btn-sm" ><i class="fa fa-pencil"></i> Edit</a>';

                $btn .= '<form method="POST" action="' . $url . '">
                                <input type="hidden" name = "_token" value = ' . csrf_token() . '>
                                <input type="hidden" name = "_method" value ="DELETE">
                                <button type="submit" onclick="return confirm(\'Are you sure you wish to delete this entry?\')" class="btn btn-sm btn-danger">Delete</button>
                            </form>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['action',])
            ->make(true);
        // }
    }

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
        // return $request->all();
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
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_encreption' => $request->mail_encryption,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_from_addressed' => $request->mail_from_addressed,
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
        $smtp = Smtp::find($id);
        // return $smtp;
        if ($smtp) {
            return view('admin.settings.smtp.edit')->with(['smtp' => $smtp]);
        } else {
            return back()->with(['message', "An error occured"]);
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
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_encryption' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_from_addressed' => 'required',
        ]);

        try {
            Smtp::where('id', $id)->update([
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_encreption' => $request->mail_encryption,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_from_addressed' => $request->mail_from_addressed,
            ]);

            return redirect()->route('setting.tabs')->with(['message' => 'Updated Successfully.', 'message_type' => 'success']);
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
        $smtp = Smtp::find($id);

        if ($smtp) {
            $smtp->delete();
            return redirect()->route('setting.tabs')->with(['message' => 'add Successfully.', 'message_type' => 'success']);
        } else {
            return back()->with(['message', "An error occured"]);
        }
    }
}
