<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'lokasi_gedung',
        'ruangan',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}