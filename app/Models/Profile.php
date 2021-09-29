<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'no_hp',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_ktp',
        'foto_diri' 
    ];
}
