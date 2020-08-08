<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Peserta;
use App\Pengajar;
use App\Warga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title =  "Dashboard";
        $user = User::count();
        return view('home.index', compact('title', 'user'));
    }
}
