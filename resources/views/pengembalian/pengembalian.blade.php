@extends('layouts.navbar')

@section('title', 'Data Pengembalian')

@section('content')

<div class="space-y-6">

    <div>
        <h2 class="text-xl font-bold text-slate-900 px-10 py-1">
            Data Pengembalian
        </h2>

        <p class="text-xs text-slate-500 mt-1 px-">
            Kelola pengembalian barang yang telah dipinjam.
        </p>
    </div>


    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 px-5 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('rekap.export.pengembalian', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}" 
        class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2.5 rounded-xl hover:bg-emerald-700 transition text-xs font-semibold shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        <span>Export Excel Pengembalian</span>
    </a>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="text-left px-5 py-3">
                            Kode Peminjaman
                        </th>

                        <th class="text-left px-5 py-3">
                            Pegawai
                        </th>

                        <th class="text-left px-5 py-3">
                            Barang
                        </th>

                        <th class="text-left px-5 py-3">
                            Tanggal Kembali
                        </th>

                        <th class="text-left px-5 py-3">
                            Kondisi
                        </th>
                        
                        <th class="text-left px-5 py-3">
                            Keterangan
                        </th>

                        <th class="text-left px-5 py-3">
                            Admin
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                @forelse($pengembalians as $pengembalian)

                    <tr>

                        <td class="px-5 py-4 font-semibold">

                            {{ $pengembalian->peminjaman->kode_peminjaman ?? '-' }}

                        </td>


                        <td class="px-5 py-4">

                            {{ $pengembalian->peminjaman->pegawai->nama ?? '-' }}

                        </td>


                        <td class="px-5 py-4">

                            {{ $pengembalian->peminjaman->barang->nama
                                ?? $pengembalian->peminjaman->barang->kode_barang
                                ?? '-' }}

                        </td>


                        <td class="px-5 py-4">

                            {{ $pengembalian->tgl_kembali }}

                        </td>


                        <td class="px-5 py-4">

                            @if($pengembalian->kondisi_barang === 'baik')

                                <span class="px-2.5 py-1 rounded-full text-xs bg-emerald-50 text-emerald-700">
                                    Baik
                                </span>

                            @elseif($pengembalian->kondisi_barang === 'rusak_ringan')

                                <span class="px-2.5 py-1 rounded-full text-xs bg-amber-50 text-amber-700">
                                    Rusak Ringan
                                </span>

                            @else

                                <span class="px-2.5 py-1 rounded-full text-xs bg-rose-50 text-rose-700">
                                    Rusak Berat
                                </span>

                            @endif

                        </td>


                        <td class="px-5 py-4">

                            {{ $pengembalian->admin->name ?? '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-10 text-slate-400">

                            Belum ada data pengembalian.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection