<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Imports\PegawaiImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::latest()->get();

        return view('public.pegawai', compact('pegawai'));
    }

    // Simpan pegawai dari form manual
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'jabatan' => 'required',
            'lokasi_gedung' => 'required',
            'ruangan' => 'required',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'lokasi_gedung' => $request->lokasi_gedung,
            'ruangan' => $request->ruangan,
        ]);

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    // Import Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
        ]);

        Excel::import(
            new PegawaiImport,
            $request->file('file')
        );

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diimport.');
    }
}