<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;

    protected $table = 'penugasan';
    protected $fillable = ['magang_id', 'tugas_id'];

    public function tugas(){
        return $this->belongsTo(Tugas::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'magang_id');
    }
}
