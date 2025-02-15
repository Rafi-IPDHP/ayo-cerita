<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'story',
        'tanggal_upload',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
