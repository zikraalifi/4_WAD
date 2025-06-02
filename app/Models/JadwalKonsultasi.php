<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsultasi extends Model
{
    use HasFactory;

    // --- TAMBAHKAN DUA BARIS INI (jika belum ada atau berbeda) ---
    protected $table = 'jadwal_konsultasis'; // Pastikan nama tabelnya eksplisit
    protected $connection = 'mysql';      // Pastikan menggunakan koneksi default Anda (sesuai .env)
    // -------------------------------------------------------------

    protected $fillable = [
        'nama_mahasiswa',
        'nama_dokter',
        'tanggal',
        'jam',
    ];

    protected $dates = [
        'tanggal',
    ];
}