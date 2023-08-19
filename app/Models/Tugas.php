<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = ['name', 'deskripsi', 'admin_id', 'batas_waktu'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penugasan() {
        return $this->hasMany(Penugasan::class, 'tugas_id');
    }
}
