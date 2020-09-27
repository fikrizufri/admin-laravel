<?php

namespace App\Http\Controllers;

use App\Models\Saksi;
use App\Models\Tps;

use Str;
use Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class SaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Saksi";
        $dataSaksi = Saksi::paginate(5);
        $route = 'saksi';
        return view('saksi.index', compact("title", "dataSaksi", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Saksi";
        $route = 'saksi';
        $dataTps = Tps::all();
        $action = route('saksi.store');

        return view('saksi.create', compact(
            "title",
            "action",
            "dataTps",
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
            'max' => ':attribute maksimal 13',
            'min' => ':attribute minimal 10',
        ];

        $this->validate(request(), [
            'nik' => 'required|unique:saksi',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|unique:saksi|max:13|min:10',
            'tps_id' => 'required|unique:saksi',

        ], $messages);

        $nama = $request->nama;
        $slug = Str::slug($nama, '-');
        $foto = $request->foto;

        $saksi = new Saksi;
        $saksi->nik =  $request->nik;
        $saksi->nama =  $nama;
        $saksi->nohp =  $request->nohp;
        $saksi->alamat =  $request->alamat;
        $saksi->tps_id =  $request->tps_id;


        if ($foto) {
            $this->validate(request(), [
                'foto' => 'mimes:jpeg,bmp,png,jpg'
            ], $messages);

            $nama_gambar = $slug . '.' . $foto->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('saksi')) {
                Storage::disk('public')->makeDirectory('saksi');
            }

            $path = public_path('storage/saksi/' . $nama_gambar);

            $gambar_original = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('saksi/' . $nama_gambar, $gambar_original);

            if (!Storage::disk('public')->exists('saksi/thumbnail')) {
                Storage::disk('public')->makeDirectory('saksi/thumbnail');
            }
            $thumbnail = Image::make($foto)->resize(360, 360)->save($path);
            Storage::disk('public')->put('saksi/thumbnail/' . $nama_gambar, $thumbnail);
        } else {
            $nama_gambar = NULL;
        }
        $saksi->foto = $nama_gambar;

        $saksi->save();
        return redirect()->route('saksi.index')->with('message', 'Saksi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function show(Saksi $saksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Saksi $saksi)
    {
        $title =  "Saksi";
        $route = 'saksi';
        $dataTps = Tps::all();
        $action = route('saksi.update', $saksi->id);

        return view('saksi.edit', compact(
            "title",
            "action",
            "dataTps",
            "saksi",
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saksi $saksi)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'same' => 'Password dan konfirmasi password harus sama',
            'max' => ':attribute maksimal 13',
            'min' => ':attribute minimal 10',
        ];

        $this->validate(request(), [
            'nik' => 'required|unique:saksi,nik,' . $saksi->id,
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|max:13|min:10|unique:saksi,tps_id,' . $saksi->id,
            'tps_id' => 'required|unique:saksi,tps_id,' . $saksi->id,

        ], $messages);

        $nama = $request->nama;
        $slug = Str::slug($nama, '-');
        $foto = $request->foto;

        $saksi->nik =  $request->nik;
        $saksi->nama =  $nama;
        $saksi->nohp =  $request->nohp;
        $saksi->alamat =  $request->alamat;
        $saksi->tps_id =  $request->tps_id;

        if (isset($foto)) {
            $this->validate(request(), [
                'foto' => 'mimes:jpeg,bmp,png,jpg'
            ], $messages);
            $nama_gambar = $slug . '.' . $foto->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('saksi')) {
                Storage::disk('public')->makeDirectory('saksi');
            }

            $path = public_path('storage/saksi/' . $nama_gambar);

            if (Storage::disk('public')->exists('saksi/' . $saksi->foto)) {
                Storage::disk('public')->delete('saksi/' . $saksi->foto);
            }

            $gambar_original = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('saksi/' . $nama_gambar, $gambar_original);

            if (!Storage::disk('public')->exists('saksi/thumbnail')) {
                Storage::disk('public')->makeDirectory('saksi/thumbnail');
            }

            if (Storage::disk('public')->exists('saksi/thumbnail/' . $saksi->foto)) {
                Storage::disk('public')->delete('saksi/thumbnail/' . $saksi->foto);
            }
            $thumbnail = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('saksi/thumbnail/' . $nama_gambar, $thumbnail);
            $saksi->foto = $nama_gambar;
        }

        $saksi->save();
        return redirect()->route('saksi.index')->with('message', 'Saksi berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saksi $saksi)
    {
        $saksi->delete();

        return redirect()->route('saksi.index')->with('message', 'Saksi berhasil dihapus')->with('Class', 'Hapus');
    }
}
