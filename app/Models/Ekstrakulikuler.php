<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Ekstrakulikuler;
use App\Models\Siswa;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama_ekstrakulikuler',
        'tahun_mulai',
    ];

    public function siswas()
    {
        return $this->belongsTo(Siswa::class);
    }
    
}

