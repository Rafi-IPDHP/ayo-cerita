<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;

    protected $table = 'psikologs';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'spesialisasi',
        'str_doc',
        'sip_doc',
        'institusi_pendidikan',
        'photo',
        'desc',
        'user_id',
    ];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
