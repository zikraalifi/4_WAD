<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'nama_dokter',
        'tanggal',
        'jam',
    ];
}