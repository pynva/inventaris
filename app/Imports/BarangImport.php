<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class BarangImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        if (empty($row['nama'])) {
            return null;
        }

        return new Barang([
    'kode_barang' => $row['kode_barang'],
    'hostname' => $row['hostname'] ?? null,
    'merk' => $row['merk'] ?? null,
    'jenis' => $row['jenis_barang'] ?? null,
    'warna' => $row['warna'] ?? null,
    'sn' => $row['serial_number'] ?? null,
    'spesifikasi' => $row['spesifikasi_detail'] ?? null,
    'os' => $row['os'] ?? null,
    'office' => $row['office_license'] ?? null,
    'kepemilikan' => $row['status_kepemilikan'] ?? null,
    'status_kondisi' => $row['status_barang'] ?? null,

    // Barang baru otomatis tersedia
    'status_peminjaman' => 'Ready',
]);
    }
}