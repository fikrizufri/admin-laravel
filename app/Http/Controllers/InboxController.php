<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Inbox";
        $dataInbox = Inbox::paginate(5);
        $route = 'Inbox';
        return view('inbox.index', compact("title", "dataInbox", "route"));
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
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function receive(Request $request)
    {
        // return $request;
        $inbox = new Inbox;
        $inbox->id_sms =  $request->idsms;
        $inbox->sender =  $request->sender;
        $inbox->content = $request->content;
        $inbox->modem = $request->modem;
        $inbox->auth = $request->auth;
        $inbox->tanggal = $request->datetime;
        $inbox->save();
        try {
            $data = [
                "status" => "succes",
                "data" => $inbox
            ];
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $data = [
                "status" => "gagal",
                "data" => $request
            ];
        }


        return response()->json($data);
    }
}
