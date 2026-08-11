<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $barangReady = Barang::where('status', 'Ready')->count();

        $sedangDipinjam = Barang::where('status', 'Dipinjam')->count();

        $maintenance = Barang::where('status', 'Maintenance')->count();

        $rusak = Barang::where('status', 'Rusak')->count();

        $barangAset = Barang::where('kepemilikan', 'Aset')->count();

        $barangSewa = Barang::where('kepemilikan', 'Sewa')->count();

        return view('dashboard', compact(
            'totalBarang',
            'barangReady',
            'sedangDipinjam',
            'rusak',
            'maintenance',
            'barangAset',
            'barangSewa'
        ));
    }
}