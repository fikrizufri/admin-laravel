<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Kecamatan";
        $dataKecamatan = Kecamatan::paginate(5);
        $route = 'kecamatan';
        return view('kecamatan.index', compact("title", "dataKecamatan", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Kecamatan";
        $route = 'kecamatan';
        $dataKabupaten = Kabupaten::all();
        $action = route('kecamatan.store');

        return view('kecamatan.create', compact("title", "action", "dataKabupaten"));
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
            'nama' => 'required|unique:kecamatan',
            'kabupaten' => 'required',
        ], $messages);

        $kecamatan = new Kecamatan;
        $kecamatan->nama =  $request->nama;
        $kecamatan->kabupaten_id =  $request->kabupaten;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with('message', 'Kecamatan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        $title =  "Kecamatan " . $kecamatan->nama;
        $dataKabupaten = Kabupaten::all();
        $action = route('kecamatan.update', $kecamatan->id);
        return view('kecamatan.edit', compact('action', 'title', 'kecamatan', 'dataKabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'date' => ':attribute harus menggunakan tanggal yang benar',
            'date_format' => ':attribute harus menggunakan tanggal yang benar',
            'max' => ':attribute maksimal 30',
        ];

        $this->validate(request(), [
            'nama' => 'required|unique:kecamatan,nama,' . $kecamatan->id,
            'kabupaten' => 'required',
        ], $messages);

        $kecamatan->nama = $request->nama;
        $kecamatan->kabupaten_id = $request->kabupaten;
        $kecamatan->save();

        return redirect()->route('kecamatan.index')->with('message', 'Berhasil Mengubah Data Kecamatan')->with('Class', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('message', 'Kecamatan berhasil dihapus')->with('Class', 'Berhasil');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        // $url = 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=6401';

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // $err = curl_error($ch);  //if you need
        // curl_close($ch);

        // $datakecamatan =  json_decode($response, TRUE);
        // // return $datakecamatan['kecamatan'];

        // $kecamatan =  [];

        // foreach ($datakecamatan['kecamatan'] as $key => $value) {
        //     $kecamatan = $value;
        // }
        // return $kecamatan;
    }
}
