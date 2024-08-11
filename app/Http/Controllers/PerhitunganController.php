<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = $this->getAlternatifData();
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
        $penilaians = Penilaian::select('alternatif_id', 'kriteria_id', DB::raw('AVG(nilai) as rataRataNilai'))
            ->groupBy('alternatif_id', 'kriteria_id')
            ->get();

        $rataRataPenilaian = [];
        foreach ($penilaians as $penilaian) {
            $rataRataPenilaian[$penilaian->alternatif_id][$penilaian->kriteria_id] = number_format($penilaian->rataRataNilai, 0, '', '');
        }

        $alternatifs = Alternatif::all();

        return $alternatifs->mapWithKeys(function ($item) use ($rataRataPenilaian, $useNameAsKey) {
            $key = $useNameAsKey ? $item->nama : $item->kode;
            $nilai = $rataRataPenilaian[$item->id] ?? [];
            return [$key => $nilai];
        })->toArray();
    }


    private function calculateVectorS($kriteria, $alternatif)
    {
        $vectorS = [];

        foreach ($alternatif as $key => $nilai) {
            $S = 1;

            foreach ($nilai as $index => $n) {
                $kriteriaIndex = $index - 1; 
                if (isset($kriteria[$kriteriaIndex])) {
                    $S *= pow($n, $kriteria[$kriteriaIndex]['bobot']);
                } else {
                    dd("Undefined array key", $kriteriaIndex, $kriteria, $nilai);
                }
            }

            $vectorS[$key] = $S;
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

    public function cetakPdf()
{
    $kriteria = Kriteria::all();
    $alternatif = $this->getAlternatifData(true);

    $vectorS = $this->calculateVectorS($kriteria, $alternatif);
    $vectorV = $this->calculateVectorV($vectorS);

    $ranking = $this->getRanking($vectorV);

    $pdf = Pdf::loadView('perhitungan.pdf', compact('kriteria', 'alternatif', 'vectorS', 'vectorV', 'ranking'));
    return $pdf->download('hasil-akhir.pdf');
}
}
