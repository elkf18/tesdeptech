<?php

namespace App\Models;

use App\Models\Ekstrakulikuler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'no_hp',
        'nis',
        'alamat',
        'gender',
        'foto',
    ];
    
    public function ekstrakulikulers()
    {
        return $this->hasMany(Ekstrakulikuler::class);
    }
}
