<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class PegawaiImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        if (empty($row['nama'])) {
            return null;
        }

        return new Pegawai([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'jabatan' => $row['jabatan'] ?? null,
            'lokasi_gedung' => $row['lokasi_gedung'] ?? null,
            'ruangan' => $row['ruangan'] ?? null,
        ]);
    }
}