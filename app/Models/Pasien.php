<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = "pasien";
    protected $fillable = [
        'user_id',
        'no_identitas',
        'jenis_pasien',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'poli_id'
    ];

    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hubungan dengan model Poli
    public function poli()
    {
        return $this->belongsTo(Alternatif::class, 'poli_id');
    }
}
