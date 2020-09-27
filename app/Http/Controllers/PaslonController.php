<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use Str;
use Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PaslonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  "Paslon";
        $dataPaslon = Paslon::orderBy('nourut', 'ASC')->paginate(5);
        $route = 'paslon';
        return view('paslon.index', compact("title", "dataPaslon", "route"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Paslon";
        $route = 'paslon';
        $action = route('paslon.store');

        return view('paslon.create', compact("title", "action", "route"));
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
            'kode' => 'required|unique:paslon,kode',
            'nama' => 'required',
            'nourut' => 'required|unique:paslon,nourut',

        ], $messages);
        $kode = $request->kode;
        $slug = Str::slug($kode, '-');
        $foto = $request->foto;

        $paslon = new Paslon;
        $paslon->nama =  $request->nama;
        $paslon->kode =  $slug;
        $paslon->nourut =  $request->nourut;
        if ($foto) {
            $this->validate(request(), [
                'foto' => 'mimes:jpeg,bmp,png,jpg'
            ], $messages);

            $nama_gambar = $slug . '.' . $foto->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('paslon')) {
                Storage::disk('public')->makeDirectory('paslon');
            }

            $path = public_path('storage/paslon/' . $nama_gambar);

            $gambar_original = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('paslon/' . $nama_gambar, $gambar_original);

            if (!Storage::disk('public')->exists('paslon/thumbnail')) {
                Storage::disk('public')->makeDirectory('paslon/thumbnail');
            }
            $thumbnail = Image::make($foto)->resize(360, 360)->save($path);
            Storage::disk('public')->put('paslon/thumbnail/' . $nama_gambar, $thumbnail);
        } else {
            $nama_gambar = NULL;
        }
        $paslon->foto = $nama_gambar;

        $paslon->save();
        return redirect()->route('paslon.index')->with('message', 'Paslon berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paslon  $paslon
     * @return \Illuminate\Http\Response
     */
    public function show(Paslon $paslon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paslon  $paslon
     * @return \Illuminate\Http\Response
     */
    public function edit(Paslon $paslon)
    {
        $title =  "Paslon " . $paslon->nama;
        $action = route('paslon.update', $paslon->id);
        return view('paslon.edit', compact('action', 'title', 'paslon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paslon  $paslon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paslon $paslon)
    {

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama dengan data yang terdahulu',
            'same' => 'Password dan konfirmasi password harus sama',
        ];

        $this->validate(request(), [
            'kode' => 'required|unique:paslon,kode,' . $paslon->id,
            'nourut' => 'required|unique:paslon,nourut,' . $paslon->id,

        ], $messages);

        $kode = $request->kode;
        $slug = Str::slug($kode, '-');
        $foto = $request->foto;

        $paslon->nama =  $request->nama;
        $paslon->kode =  $slug;
        $paslon->nourut =  $request->nourut;

        if (isset($foto)) {
            $this->validate(request(), [
                'foto' => 'mimes:jpeg,bmp,png,jpg'
            ], $messages);
            $nama_gambar = $slug . '.' . $foto->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('paslon')) {
                Storage::disk('public')->makeDirectory('paslon');
            }

            $path = public_path('storage/paslon/' . $nama_gambar);

            if (Storage::disk('public')->exists('paslon/' . $paslon->foto)) {
                Storage::disk('public')->delete('paslon/' . $paslon->foto);
            }

            $gambar_original = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('paslon/' . $nama_gambar, $gambar_original);

            if (!Storage::disk('public')->exists('paslon/thumbnail')) {
                Storage::disk('public')->makeDirectory('paslon/thumbnail');
            }

            if (Storage::disk('public')->exists('paslon/thumbnail/' . $paslon->foto)) {
                Storage::disk('public')->delete('paslon/thumbnail/' . $paslon->foto);
            }
            $thumbnail = Image::make($foto)->resize(720, 720)->save($path);
            Storage::disk('public')->put('paslon/thumbnail/' . $nama_gambar, $thumbnail);
            $paslon->foto = $nama_gambar;
        }
        $paslon->save();
        return redirect()->route('paslon.index')->with('message', 'Paslon berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paslon  $paslon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paslon $paslon)
    {
        $paslon->delete();

        return redirect()->route('paslon.index')->with('message', 'Paslon berhasil dihapus')->with('Class', 'Hapus');
    }
}
