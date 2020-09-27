<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\Saksi;
use App\Models\Paslon;
use App\Models\Perhitungan;


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
        $title =  "Inbox";
        $inbox->status = 'baca';
        $inbox->save();
        return view('inbox.detail', compact("title", "inbox"));
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
     * data inbox receive from storage.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function receive(Request $request)
    {
        // return $request;

        try {
            $inbox = new Inbox;
            $inbox->id_sms =  $request->idsms;
            $inbox->sender =  $request->sender;
            $inbox->content = $request->content;
            $inbox->modem = $request->modem;
            $inbox->auth = $request->auth;
            $inbox->tanggal = $request->datetime;
            $inbox->save();
            $saksi = Saksi::where('nohp', $request->sender)->first();
            $content = $request->content;
            $kode = '';
            $suara = '';
            $paslon_id = '';
            if ($saksi) {
                if ($content) {
                    $arrayconten = (explode(" ", $content));
                    foreach ($arrayconten as $key => $value) {
                        if ($key == 0) {
                            # code...
                            $kode = $value;
                        }
                        if ($key == 1) {
                            $suara = $value;
                        }
                    }
                    if ($kode != "") {
                        $paslon = Paslon::where('kode', $kode)->first();
                        if ($paslon) {
                            $paslon_id = $paslon->id;

                            if ($suara > 0) {
                                try {
                                    //code...
                                    $perhitungan = Perhitungan::where('paslon_id', $request->paslon_id)->where('saksi_id', $request->saksi_id)->first();
                                    if (!$perhitungan) {
                                        $perhitungan = new Perhitungan;
                                    }
                                    $perhitungan->paslon_id =  $paslon_id;
                                    $perhitungan->tanggal =  now();
                                    $perhitungan->jumlah =  $suara;
                                    $perhitungan->saksi_id =  $saksi->id;

                                    $perhitungan->save();
                                    return "terimkasih atas poling anda";
                                } catch (\Throwable $th) {
                                    return "gagal database eror";
                                }
                            } else {
                                return "harap masukkan suara dengan angka";
                            }
                        } else {
                            return "Keyword Paslon anda salah";
                        }
                    } else {
                        return "keyword anda salah";
                    }
                } else {
                    return "sms ada kurang tepat";
                }
            } else {
                return "anda bukan saksi";
            }
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

    public function unread()
    {
        $dataInbox = Inbox::where('status', 'tidak')->count();

        return response()->json($dataInbox);
    }
}
