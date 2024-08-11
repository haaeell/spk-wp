<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Pasien;
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
        $jumlahPasien = Pasien::count();
        $jumlahPoli = Alternatif::count();
        $jumlahKriteria = Kriteria::count();
        return view('home', compact('jumlahPasien', 'jumlahPoli', 'jumlahKriteria'));
    }
}
