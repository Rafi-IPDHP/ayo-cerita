<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';

    protected $fillable = [
        'nama',
        'umur',
        'user_id'
    ];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
