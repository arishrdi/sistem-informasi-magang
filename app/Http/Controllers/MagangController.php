<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $magang = User::role('magang')->paginate(25);
        $total = User::role('magang')->count();
        return view('admin.magang.daftar-magang', compact('magang', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Magang $magang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magang $magang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Magang $magang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magang $magang)
    {
        //
    }

    // kandidat
    public function kandidat()
    {
        $kandidat = User::role('kandidat')->paginate(25);
        $total = User::role('kandidat')->count();
        return view('admin.magang.daftar-kandidat', compact('kandidat', 'total'));
    }

    public function terima_kandidat(User $user)
    {

        $user->syncRoles('magang');
        return redirect()->back();
    }
}
