<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with([
            'peminjaman.pegawai',
            'peminjaman.barang',
            'admin'
        ])
        ->latest()
        ->get();

        return view('pengembalian.pengembalian', compact('pengembalians'));
    }

    public function store(Request $request, $peminjamanId)
    {
        $request->validate([
            'tgl_kembali' => ['required', 'date'],
            'kondisi_barang' => ['required', 'in:baik,rusak_ringan,rusak_berat'],
            'catatan' => ['nullable', 'string'],
        ]);

        $peminjaman = Peminjaman::findOrFail($peminjamanId);

        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'tgl_kembali' => $request->tgl_kembali,
            'kondisi_barang' => $request->kondisi_barang,
            'catatan' => $request->catatan,
            'admin_id' => Auth::id(),
        ]);

        // Peminjaman selesai
        $peminjaman->update([
            'status' => 'selesai',
        ]);

        // Barang kembali tersedia
        if ($peminjaman->barang) {
            $peminjaman->barang->update([
                'status' => 'Ready',
            ]);
        }

        return back()->with(
            'success',
            'Pengembalian berhasil diproses.'
        );
    }
}