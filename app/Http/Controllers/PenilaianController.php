<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Pasien;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();

        if ($kriterias->isEmpty() || $alternatifs->isEmpty()) {
            return view('admin.penilaian.index')->with('message', 'Data kriteria atau alternatif tidak ditemukan.');
        }

        $penilaians = Penilaian::select('alternatif_id', 'kriteria_id', DB::raw('AVG(nilai) as rataRataNilai'))
            ->groupBy('alternatif_id', 'kriteria_id')
            ->get();


        $rataRataPenilaian = [];
        foreach ($penilaians as $penilaian) {
            $rataRataPenilaian[$penilaian->alternatif_id][$penilaian->kriteria_id] = round($penilaian->rataRataNilai);
        }


        return view('penilaian.index', compact('rataRataPenilaian', 'kriterias', 'alternatifs'));
    }





    public function pasienindex()
    {
        $userId = auth()->id();
        $hasRated = Penilaian::where('user_id', $userId)->exists();
        $pasien = Pasien::where('user_id', $userId)->first();
        $kriterias = Kriteria::all();
        return view('pasien.penilaian.index', compact('hasRated', 'kriterias', 'pasien'));
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
        // Validasi input
        $request->validate([
            'alternatif_id' => 'required|exists:pasien,id',
            'penilaian' => 'required|array',
            'penilaian.*' => 'required|integer|between:1,5', // Validasi nilai antara 1-5
        ]);

        $alternatifId = $request->input('alternatif_id');
        $penilaians = $request->input('penilaian');

        foreach ($penilaians as $kriteriaId => $nilai) {
            Penilaian::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'alternatif_id' => $alternatifId,
                    'kriteria_id' => $kriteriaId
                ],
                ['nilai' => $nilai]
            );
        }

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
