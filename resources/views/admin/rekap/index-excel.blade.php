<div class="flex items-end gap-2">
    <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 transition">
        Filter
    </button>
    
    <!-- Tombol Export Peminjaman -->
    <a href="{{ route('rekap.exports.peminjaman', ['bulan' => $bulan, 'tahun' => $tahun]) }}" 
       class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 transition flex items-center gap-1 text-sm">
       📊 Excel Peminjaman
    </a>

    <!-- Tombol Export Pengembalian -->
    <a href="{{ route('rekap.exports.pengembalian', ['bulan' => $bulan, 'tahun' => $tahun]) }}" 
       class="bg-emerald-700 text-white px-3 py-2 rounded hover:bg-emerald-800 transition flex items-center gap-1 text-sm">
       📊 Excel Pengembalian
    </a>
</div>