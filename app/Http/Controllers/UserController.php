<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $title =  "Pengguna";
        $dataUser = User::where('id', '!=', 1)->paginate(5);
        return view('user.index', ["title" => $title, "dataUser" => $dataUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  "Tambah Pengguna";
        $action = route('user.store');

        return view('user.create', compact("title", "action"));
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
            'unique' => ':attribute tidak boleh sama',
            'same' => 'Password dan konfirmasi password harus sama',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'passwordConfrim' => 'required|same:password|min:6',
        ], $messages);

        $pass = bcrypt(request()->input('password'));
        $name = request()->input('name');

        $user = new User;
        $user->name = $name;
        $user->username = $name;
        $user->email = request()->input('email');
        $user->password = $pass;
        $user->save();
        return redirect()->route('user.index')->with('message', 'User berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title =  "Ubah Pengguna " . $user->nama;
        $action = route('user.update', $user->id);
        return view('user.edit', compact('action', 'title', 'user'));
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
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'same' => ':attribute password dan confrim password harus sama',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'passwordNew' => 'required|min:6',
            'passwordConfrim' => 'required|same:passwordNew|min:6',
        ], $messages);

        $user = User::find($id);
        $password = request()->input('password');
        $name = request()->input('name');

        if (Hash::check($password, $user->password)) {
            $pass = bcrypt(request()->input('passwordNew'));
        } else {
            return redirect()->route('user.edit', $user->id)->with('message', 'Password lama anda salah');;
        }

        $user->name = $name;
        $user->username = $name;
        $user->email = request()->input('email');
        $user->password = $pass;
        $user->update();

        return redirect()->route('user.index')->with('message', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('message', 'Pengguna berhasil dihapus');
    }
}
