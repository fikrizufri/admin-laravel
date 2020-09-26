<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Kelurahan";
        $dataKelurahan = Kelurahan::paginate(5);
        $route = 'kelurahan';
        return view('kelurahan.index', compact("title", "dataKelurahan", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Kelurahan";
        $route = 'kelurahan';
        $dataKabupaten = Kabupaten::all();
        $dataKecamatan = Kecamatan::all();
        $action = route('kelurahan.store');

        return view('kelurahan.create', compact("title", "action", "dataKabupaten", "dataKecamatan"));
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
            'nama' => 'required|unique:kelurahan',
            'kecamatan' => 'required',
        ], $messages);

        $kelurahan = new Kelurahan;
        $kelurahan->nama =  $request->nama;
        $kelurahan->kecamatan_id =  $request->kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with('message', 'Kecamatan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        $title =  "Kelurahan " . $kelurahan->nama;
        $dataKabupaten = Kabupaten::all();
        $dataKecamatan = Kecamatan::all();
        $action = route('kelurahan.update', $kelurahan->id);
        return view('kelurahan.edit', compact('action', 'title', 'kelurahan', 'dataKabupaten', 'dataKecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'date' => ':attribute harus menggunakan tanggal yang benar',
            'date_format' => ':attribute harus menggunakan tanggal yang benar',
            'max' => ':attribute maksimal 30',
        ];

        $this->validate(request(), [
            'nama' => 'required|unique:kelurahan,nama,' . $kelurahan->id,
            'kecamatan' => 'required',
        ], $messages);

        $kelurahan->nama = $request->nama;
        $kelurahan->kecamatan_id = $request->kecamatan;
        $kelurahan->save();

        return redirect()->route('kelurahan.index')->with('message', 'Berhasil Mengubah Data Kelurahan')->with('Class', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();

        return redirect()->route('kelurahan.index')->with('message', 'Kelurahan berhasil dihapus')->with('Class', 'Berhasil');
    }
}
