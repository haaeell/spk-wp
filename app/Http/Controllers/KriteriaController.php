<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
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
        'kode' => 'required|unique:kriteria,kode',
        'nama' => 'required',
        'bobot' => 'required|numeric', // Validasi bobot sebagai angka
        'cost_benefit' => 'required|in:cost,benefit', // Validasi cost_benefit hanya bisa cost atau benefit
    ]);

    $bobot = $request->bobot / 100;
    // Buat entri kriteria baru
    Kriteria::create([
        'kode' => $request->kode,
        'nama' => $request->nama,
        'bobot' => $bobot,
        'cost_benefit' => $request->cost_benefit,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
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
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode' => 'required|unique:kriteria,kode,' . $id,
            'nama' => 'required',
            'bobot' => 'required|numeric', // Validasi bobot sebagai angka
            'cost_benefit' => 'required|in:cost,benefit', // Validasi cost_benefit hanya bisa cost atau benefit
        ]);
    
        // Temukan entri kriteria
        $kriteria = Kriteria::findOrFail($id);
    
        $bobot = $request->bobot / 100;
        // Perbarui entri kriteria
        $kriteria->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $bobot,
            'cost_benefit' => $request->cost_benefit,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
