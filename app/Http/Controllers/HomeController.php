<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_tugas = Penugasan::all()->where('magang_id','=',  Auth::user()->id)->count();

        if (Auth::user()->hasRole('kandidat')) {
            return view('kandidat');
        }

        return view('home', compact('jumlah_tugas'));
    }

    public function ajuan()
    {
        return view('form-ajuan');
    }
}
