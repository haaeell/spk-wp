<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = $this->getAlternatifData();
        dd($alternatif);

        $vectorS = $this->calculateVectorS($kriteria, $alternatif);
        $vectorV = $this->calculateVectorV($vectorS);

        $ranking = $this->getRanking($vectorV);

        return view('perhitungan.index', compact('kriteria', 'alternatif', 'vectorS', 'vectorV', 'ranking'));
    }

    public function hasilAkhir()
    {
        $kriteria = Kriteria::all();
        $alternatif = $this->getAlternatifData(true);

        $vectorS = $this->calculateVectorS($kriteria, $alternatif);
        $vectorV = $this->calculateVectorV($vectorS);

        $ranking = $this->getRanking($vectorV);

        return view('hasil-akhir.index', compact('kriteria', 'alternatif', 'vectorS', 'vectorV', 'ranking'));
    }

    private function getAlternatifData($useNameAsKey = false)
    {
        return Alternatif::with('penilaians')->get()->mapWithKeys(function ($item) use ($useNameAsKey) {
            $key = $useNameAsKey ? $item['nama'] : $item['kode'];
            return [$key => $item->penilaians->pluck('nilai')->toArray()];
        })->toArray();
    }

    private function calculateVectorS($kriteria, $alternatif)
    {
        $vectorS = [];
        $jumlahVectorS = 0;

        foreach ($alternatif as $key => $nilai) {
            $S = array_reduce($nilai, function ($carry, $n) use ($kriteria, $key) {
                $index = array_search($key, array_column($kriteria->toArray(), 'kode'));
                return $carry * pow($n, $kriteria[$index]['bobot']);
            }, 1);

            $vectorS[$key] = $S;
            $jumlahVectorS += $S;
        }

        return $vectorS;
    }

    private function calculateVectorV($vectorS)
    {
        $jumlahVectorS = array_sum($vectorS);

        return array_map(function ($S) use ($jumlahVectorS) {
            return $S / $jumlahVectorS;
        }, $vectorS);
    }

    private function getRanking($vectorV)
    {
        arsort($vectorV);
        return array_keys($vectorV);
    }
}
