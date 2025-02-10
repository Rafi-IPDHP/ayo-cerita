<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = [
        'pengguna_id',
        'psikolog_id',
        'jam',
        'comment',
        'status',
        'tanggal_konsul',
    ];

    public function pengguna() {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function psikolog() {
        return $this->belongsTo(Psikolog::class, 'psikolog_id');
    }
}
