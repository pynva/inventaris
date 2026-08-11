<?php

namespace App\Exports;

use App\Models\Pengembalian;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class PengembalianExport implements FromQuery, WithHeadings, WithMapping, WithTitle
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function title(): string
    {
        return 'Data Pengembalian';
    }

    public function query()
    {
        $query = Pengembalian::query()->with(['pegawai', 'barang']);

        if ($this->tahun) {
            $query->whereYear('created_at', $this->tahun);
        }
        if ($this->bulan) {
            $query->whereMonth('created_at', $this->bulan);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'Kode Peminjaman',
            'Nama Pegawai',
            'NIP',
            'Nama / Merk Barang',
            'Tanggal Kembali',
            'Status',
        ];
    }

    public function map($pengembalian): array
    {
        return [
            $pengembalian->peminjaman->kode_peminjaman ?? $pengembalian->kode_peminjaman ?? '-',
            $pengembalian->pegawai->nama_lengkap ?? $pengembalian->pegawai->nama ?? '-',
            $pengembalian->pegawai->nip ?? '-',
            $pengembalian->barang->nama_barang ?? $pengembalian->barang->merk ?? '-',
            $pengembalian->tanggal_kembali ?? $pengembalian->created_at->format('Y-m-d'),
            'Dikembalikan',
        ];
    }
}