<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PublicPeminjamanController extends Controller
{
    // Method create ini yang dipanggil oleh Route::get('/pinjam')
    public function create()
{
    $pegawais = Pegawai::all();
    $barangs = Barang::where('status', 'tersedia')->get();
    
    // Panggil view di dalam folder views/public/
    return view('public.peminjaman-public', compact('pegawais', 'barangs'));
}

    // Method store untuk menyimpan data saat tombol submit diklik
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'barang_id'  => 'required|exists:barangs,id',
            'catatan'    => 'nullable|string',
            'tanggal_pinjam' => 'required|date', 
        ]);

        $pegawai = Pegawai::findOrFail($request->pegawai_id);

    Peminjaman::create([
        'kode_peminjaman' => 'TRX-' . time(),
        'pegawai_id'     => $request->pegawai_id,
        'barang_id'      => $request->barang_id,
        'jabatan'        => $pegawai->jabatan ?? '-',
        'unit_kerja'     => $pegawai->unit_kerja ?? '-',
        'lokasi_ruangan' => $pegawai->ruangan ?? '-',
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tgl_pengajuan'  => now(),
        'status'         => 'pending',
    ]);

        return redirect()->back()->with('success', 'Pengajuan peminjaman berhasil terkirim! Silakan tunggu konfirmasi Admin.');
    }
}