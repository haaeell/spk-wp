<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alternatif')->insert([
            ['kode' => 'A1', 'nama' => 'Poli Penyakit Dalam'],
            ['kode' => 'A2', 'nama' => 'Poli Syaraf'],
            ['kode' => 'A3', 'nama' => 'Poli Jantung'],
            ['kode' => 'A4', 'nama' => 'Poli Kandungan'],
            ['kode' => 'A5', 'nama' => 'Poli Fisioterapi'],
        ]);
        
        DB::table('kriteria')->insert([
            ['kode' => 'C1', 'nama' => 'Asuhan Pasien', 'bobot' => 0.3, 'cost_benefit' => 'benefit'],
            ['kode' => 'C2', 'nama' => 'Keterampilan interpesonal & Komunikasi', 'bobot' => 0.25, 'cost_benefit' => 'benefit'],
            ['kode' => 'C3', 'nama' => 'Penulisan & Kelengkapan Rekam Medis', 'bobot' => 0.2, 'cost_benefit' => 'benefit'],
            ['kode' => 'C4', 'nama' => 'Profesionalisme/Perilaku Kerja', 'bobot' => 0.15, 'cost_benefit' => 'benefit'],
            ['kode' => 'C5', 'nama' => 'Kebersihan & Kelengkapan Ruang Tunggu Poli', 'bobot' => 0.1, 'cost_benefit' => 'benefit'],
        ]);
    }
}
