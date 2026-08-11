<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menampilkan daftar peminjaman
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'pegawai',
            'barang',
            'admin'
        ])
        ->latest()
        ->get();

        return view('peminjaman.peminjaman', compact('peminjamans'));
    }

    // Menampilkan form tambah peminjaman
    public function create()
    {
        $pegawais = Pegawai::orderBy('nama_lengkap')->get();

        $barangs = Barang::where('status', 'Ready')
            ->orderBy('kode_barang')
            ->get();

        return view('peminjaman.create', compact('pegawais', 'barangs'));
    }

    // Menyimpan peminjaman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'barang_id' => 'required|exists:barangs,id',
            'jabatan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'lokasi_ruangan' => 'required|string|max:255',
            'tgl_pengajuan' => 'required|date',
            'tgl_pinjam' => 'nullable|date',
            'tgl_kembali_rencana' => 'nullable|date|after_or_equal:tgl_pinjam',
            'catatan' => 'nullable|string',
        ]);

        // Buat kode peminjaman otomatis
        $validated['kode_peminjaman'] =
            'PJM-' . date('YmdHis');

        // Status awal
        $validated['status'] = 'pending';

        // Admin yang membuat/memproses data
        $validated['admin_id'] = Auth::id();

        Peminjaman::create($validated);

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    // Menyetujui peminjaman
    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'disetujui',
            'admin_id' => Auth::id(),
        ]);

        return back()->with(
            'success',
            'Peminjaman berhasil disetujui.'
        );
    }

    // Menolak peminjaman
    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'ditolak',
            'admin_id' => Auth::id(),
        ]);

        return back()->with(
            'success',
            'Peminjaman ditolak.'
        );
    }
}