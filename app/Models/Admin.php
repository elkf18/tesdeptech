<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'tgl_lahir',
        'jenis_kelamin',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
