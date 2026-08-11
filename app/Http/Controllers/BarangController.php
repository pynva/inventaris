<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Imports\BarangImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::latest()->get();

        return view('admin.barang', compact('barang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'hostname' => 'nullable|string|max:255',
            'merk' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'warna' => 'nullable|string|max:100',
            'sn' => 'required|string|max:255|unique:barangs,sn',
            'spesifikasi' => 'nullable|string',
            'os' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'kepemilikan' => 'required|in:Aset,Sewa',
            'status' => 'required|in:Ready,Dipinjam,Rusak,Maintenance',
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id,
            'hostname' => 'nullable|string|max:255',
            'merk' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'warna' => 'nullable|string|max:100',
            'sn' => 'required|string|max:255|unique:barangs,sn,' . $id,
            'spesifikasi' => 'nullable|string',
            'os' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'kepemilikan' => 'required|in:Aset,Sewa',
            'status' => 'required|in:Ready,Dipinjam,Rusak,Maintenance',
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus!');
    }

    // Import Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
        ]);

        Excel::import(
            new BarangImport,
            $request->file('file')
        );

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diimport.');
    }
}