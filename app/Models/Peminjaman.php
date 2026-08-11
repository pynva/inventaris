<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Peminjaman extends Model
{
    use LogsActivity;

    // Menegaskan nama tabel di database
    protected $table = 'peminjamans';

    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->useLog('peminjaman');
    }
}