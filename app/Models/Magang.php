<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;

    protected $table = 'magang';
    protected $fillable = ['user_id', 'mulai_magang', 'selesai_magang', 'instansi', 'jurusan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
