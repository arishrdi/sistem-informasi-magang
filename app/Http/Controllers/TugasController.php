<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->hasRole('admin')) {
            $tugas = Tugas::with(['penugasan.user'])->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->hasRole('magang')) {
            $tugas = Tugas::with(['penugasan.user'])
                ->whereHas('penugasan', function ($query) {
                    $query->where('magang_id', Auth::user()->id); 
                })->orderBy('id', 'desc')->get();


        }

        return view('admin.tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('magang')->get();
        return view('admin.tugas.tambah-tugas', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $magang_id = $request->only('user_id');

        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'batas_waktu' => 'required',
            'user_id' => 'required|array|min:1'
        ]);

        $tugas['name'] = $request->get('name');
        $tugas['deskripsi'] = $request->get('deskripsi');
        $tugas['batas_waktu'] = $request->get('batas_waktu');
        $tugas['admin_id'] = Auth::user()->id;

        DB::beginTransaction();

        $tugas_id = DB::table('tugas')->insertGetId($tugas);

        foreach ($magang_id['user_id'] as $id) {
            $penugasan['tugas_id'] = $tugas_id;
            $penugasan['magang_id'] = $id;
            Penugasan::create($penugasan);
        }

        DB::commit();

        return redirect(route('tugas.daftar'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas $tugas)
    {
        //
    }

    // public function magangTugas() {
    //     $tugas = Penugasan::all();

    //     return view('magang.tugas.index', compact('tugas'));
    // }
}
