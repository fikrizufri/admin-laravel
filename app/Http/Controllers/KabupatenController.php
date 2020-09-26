<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Kabupaten";
        $dataKabupaten = Kabupaten::paginate(5);
        $route = 'kabupaten';
        return view('kabupaten.index', compact("title", "dataKabupaten", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Tambah Kabupaten";
        $route = 'kabupaten';
        $action = route('kabupaten.store');

        return view('kabupaten.create', compact("title", "action"));
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
            'nama' => 'required|unique:kabupaten',
        ], $messages);

        $kabupaten = new Kabupaten;
        $kabupaten->nama =  $request->nama;
        $kabupaten->save();
        return redirect()->route('kabupaten.index')->with('message', 'Kabupaten berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        $title =  "Kabupaten " . $kabupaten->nama;
        $action = route('kabupaten.update', $kabupaten->id);
        return view('kabupaten.edit', compact('action', 'title', 'kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'date' => ':attribute harus menggunakan tanggal yang benar',
            'date_format' => ':attribute harus menggunakan tanggal yang benar',
            'max' => ':attribute maksimal 30',
        ];

        $this->validate(request(), [
            'nama' => 'required|unique:kabupaten,nama,' . $kabupaten->id,
        ], $messages);

        $kabupaten->nama = $request->nama;
        $kabupaten->save();

        return redirect()->route('kabupaten.index')->with('message', 'Berhasil Mengubah Data Kabupaten')->with('Class', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();

        return redirect()->route('kabupaten.index')->with('message', 'kabupaten berhasil dihapus')->with('Class', 'Berhasil');
    }
}
