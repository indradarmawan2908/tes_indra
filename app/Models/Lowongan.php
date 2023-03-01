<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'pendidikan',
        'tanggal_dibuka',
        'tanggal_ditutup',
        'kuota'
    ];
}
