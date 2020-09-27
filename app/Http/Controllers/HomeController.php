<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paslon;
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
        $paslon = Paslon::orderBy('nourut', 'ASC')->get();
        $nourut = [];
        $suara = [];
        foreach ($paslon as $key => $item) {
            $nourut[$key] = $item->nourut;
            $suara[$key] = $item->suara;
        }
        return view('home.index', compact(
            'title',
            'suara',
            'nourut',
            "paslon"
        ));
    }
}
