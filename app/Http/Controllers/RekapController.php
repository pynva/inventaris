<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Exports\PeminjamanExport;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{
    public function indexExcel(Request $request)
    {
        $bulan = $request->filled('bulan') ? $request->bulan : null;
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');

        $query = Peminjaman::with(['pegawai', 'barang']);

        if ($tahun) {
            $query->where(function($q) use ($tahun) {
                $q->whereYear('tanggal_pinjam', $tahun)
                  ->orWhereYear('created_at', $tahun);
            });
        }

        if ($bulan) {
            $query->where(function($q) use ($bulan) {
                $q->whereMonth('tanggal_pinjam', $bulan)
                  ->orWhereMonth('created_at', $bulan);
            });
        }

        $peminjamans = $query->latest()->get();

        return view('admin.rekap.index-excel', compact('peminjamans', 'bulan', 'tahun'));
    }

    public function exportPeminjaman(Request $request)
    {
        $bulan = $request->filled('bulan') ? $request->bulan : null;
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');

        // Catat aktivitas export ke log
        activity()
            ->causedBy(auth()->user())
            ->useLog('export')
            ->log('Mengunduh Laporan Excel Peminjaman');

        $namaFile = 'Rekap_Peminjaman_' . ($bulan ? 'Bulan_' . $bulan . '_' : '') . 'Tahun_' . $tahun . '.xlsx';

        return Excel::download(new PeminjamanExport($bulan, $tahun), $namaFile);
    }

    public function exportPengembalian(Request $request)
    {
        $bulan = $request->filled('bulan') ? $request->bulan : null;
        $tahun = $request->filled('tahun') ? $request->tahun : date('Y');

        // Catat aktivitas export ke log
        activity()
            ->causedBy(auth()->user())
            ->useLog('export')
            ->log('Mengunduh Laporan Excel Pengembalian');

        $namaFile = 'Rekap_Pengembalian_' . ($bulan ? 'Bulan_' . $bulan . '_' : '') . 'Tahun_' . $tahun . '.xlsx';

        return Excel::download(new PengembalianExport($bulan, $tahun), $namaFile);
    }
}