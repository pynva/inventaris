<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class PeminjamanExport implements FromQuery, WithHeadings, WithMapping, WithTitle
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
        return 'Data Peminjaman';
    }

    public function query()
    {
        $query = Peminjaman::query()->with(['pegawai', 'barang'])
            ->whereNull('tgl_kembali'); // Barang yang belum dikembalikan

        if ($this->tahun) {
            $query->where(function($q) {
                $q->whereYear('tanggal_pinjam', $this->tahun)
                  ->orWhereYear('created_at', $this->tahun);
            });
        }
        
        if ($this->bulan) {
            $query->where(function($q) {
                $q->whereMonth('tanggal_pinjam', $this->bulan)
                  ->orWhereMonth('created_at', $this->bulan);
            });
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'Kode Peminjaman',
            'Nama Pegawai',
            'NIP',
            'Jabatan',
            'Unit Kerja',
            'Lokasi Ruangan',
            'Nama / Merk Barang',
            'Tanggal Pinjam',
            'Status',
        ];
    }

    public function map($peminjaman): array
    {
        return [
            $peminjaman->kode_peminjaman ?? '-',
            $peminjaman->pegawai->nama_lengkap ?? $peminjaman->pegawai->nama ?? '-',
            $peminjaman->pegawai->nip ?? '-',
            $peminjaman->pegawai->jabatan ?? $peminjaman->jabatan ?? '-',
            $peminjaman->pegawai->unit_kerja ?? $peminjaman->unit_kerja ?? '-',
            $peminjaman->lokasi_ruangan ?? '-',
            $peminjaman->barang->nama_barang ?? $peminjaman->barang->merk ?? '-',
            $peminjaman->tanggal_pinjam ?? $peminjaman->created_at->format('Y-m-d'),
            ucfirst($peminjaman->status ?? 'Dipinjam'),
        ];
    }
}