<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Saksi;
use App\Models\Paslon;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Perhitungan";
        $dataPerhitungan = Perhitungan::paginate(5);
        $route = 'perhitungan';
        return view('perhitungan.index', compact("title", "dataPerhitungan", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Perhitungan";
        $route = 'perhitungan';
        $dataSaksi = Saksi::all();
        $dataPaslon = Paslon::orderBy('nourut', 'ASC')->get();
        $route = 'perhitungan';
        $action = route('perhitungan.store');

        return view('perhitungan.create', compact(
            "title",
            "action",
            "dataPaslon",
            "dataSaksi",
            "route"
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
            'min' => ':attribute minimal 1',
        ];

        $this->validate(request(), [
            // 'paslon_id' => 'required|unique:perhitungan,paslon_id',
            // 'saksi_id' => 'required|unique:perhitungan,saksi_id',
            'jumlah' => 'required|max:13|min:1',

        ], $messages);
        $perhitungan = Perhitungan::where('paslon_id', $request->paslon_id)->where('saksi_id', $request->saksi_id)->first();
        if (!$perhitungan) {
            $perhitungan = new Perhitungan;
        }
        $perhitungan->paslon_id =  $request->paslon_id;
        $perhitungan->tanggal =  now();
        $perhitungan->jumlah =  $request->jumlah;
        $perhitungan->saksi_id =  $request->saksi_id;

        $perhitungan->save();

        return redirect()->route('perhitungan.index')->with('message', 'perhitungan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
