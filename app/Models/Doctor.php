<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'specialization',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'email' => 'N/A',
            'name' => 'User tidak ditemukan'
        ]);
    }

    public function scopeSpecialization($query, $specialization)
    {
        return $query->where('specialization', 'like', '%'.$specialization.'%');
    }

    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }
}
