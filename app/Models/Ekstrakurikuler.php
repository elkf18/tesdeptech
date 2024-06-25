<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama_ekstrakulikuler',
        'tahun_mulai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
