<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Kelurahan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Tps";
        $dataTps = Tps::paginate(5);
        $route = 'tps';
        return view('tps.index', compact("title", "dataTps", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "TPS";
        $route = 'tps';
        $dataKabupaten = Kabupaten::all();
        $dataKecamatan = Kecamatan::all();
        $dataKelurahan = Kelurahan::all();
        $action = route('tps.store');

        return view('tps.create', compact(
            "title",
            "action",
            "dataKabupaten",
            "dataKecamatan",
            "dataKelurahan"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'same' => 'Password dan konfirmasi password harus sama',
        ];

        $this->validate(request(), [
            'nama' => 'required|unique:tps,nama,NULL,NULL,kelurahan_id,' . $request['kelurahan_id'],
            // 'nama' => 'required|unique:tps,nama,'.$this>id.'|unique:servers,hostname,'.$this->id,
            'kelurahan_id' => 'required',
        ], $messages);

        $tps = new Tps;
        $tps->nama =  $request->nama;
        $tps->kelurahan_id =  $request->kelurahan_id;
        $tps->save();
        return redirect()->route('tps.index')->with('message', 'TPS berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function show(Tps $tps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tps = Tps::find($id);
        $title =  "TPS " . $tps->nama;
        $dataKabupaten = Kabupaten::all();
        $dataKecamatan = Kecamatan::all();
        $dataKelurahan = Kelurahan::all();
        $action = route('tps.update', $tps->id);
        return view('tps.edit', compact(
            'action',
            'title',
            'tps',
            'dataKabupaten',
            "dataKecamatan",
            "dataKelurahan"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tps = Tps::find($id);
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'date' => ':attribute harus menggunakan tanggal yang benar',
            'date_format' => ':attribute harus menggunakan tanggal yang benar',
            'max' => ':attribute maksimal 30',
        ];

        $this->validate(request(), [
            // 'nama' => 'required|unique:tps,nama,kelurahan_id' . $tps->id,
            // 'nama' => 'unique:tps,nama,NULL,id,kelurahan_id,' . $request->nama,
            'kelurahan_id' => 'required',
            // 'nama' => 'unique:tps,nama,kelurahan_id,' .  $tps->id,
            'nama' => 'required|unique:tps,nama,' . $tps->id,
        ], $messages);


        $tps->nama = $request->nama;
        $tps->kelurahan_id = $request->kelurahan_id;
        $tps->save();

        return redirect()->route('tps.index')->with('message', 'Berhasil Mengubah Data TPS')->with('Class', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tps = Tps::find($id);
        $tps->delete();

        return redirect()->route('tps.index')->with('message', 'TPS berhasil dihapus')->with('Class', 'Berhasil');
    }
}
