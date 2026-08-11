@extends('layouts.navbar')

@section('title', 'Data Peminjaman')

@section('content')

<div class="space-y-6">

    <div>
        <h2 class="text-xl font-bold text-slate-900">
            Data Peminjaman
        </h2>

        <p class="text-xs text-slate-500 mt-1">
            Kelola pengajuan peminjaman barang.
        </p>
    </div> 


    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('rekap.export.peminjaman', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}" 
        class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2.5 rounded-xl hover:bg-emerald-700 transition text-xs font-semibold shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        <span>Export Excel Peminjaman</span>
    </a>


    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50">
                    <tr>

                        <th class="text-left px-5 py-3">
                            Kode
                        </th>

                        <th class="text-left px-5 py-3">
                            Pegawai
                        </th>

                        <th class="text-left px-5 py-3">
                            Barang
                        </th>

                        <th class="text-left px-5 py-3">
                            Tanggal
                        </th>

                        <th class="text-left px-5 py-3">
                            Status
                        </th>

                        <th class="text-left px-5 py-3">
                            Keterangan
                        </th>

                        <th class="text-center px-5 py-3">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                @forelse($peminjamans as $peminjaman)

                    <tr>

                        <td class="px-5 py-4 font-semibold">
                            {{ $peminjaman->kode_peminjaman }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $peminjaman->pegawai->nama ?? '-' }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $peminjaman->barang->nama ?? $peminjaman->barang->kode_barang ?? '-' }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $peminjaman->tgl_pengajuan }}
                        </td>

                        <td class="px-5 py-4">

                            {{ ucfirst($peminjaman->status) }}

                        </td>

                        <td class="px-5 py-4">

                            @if($peminjaman->status === 'disetujui')

                                <span class="text-emerald-600 text-xs font-medium">
                                    Approved by
                                    {{ $peminjaman->admin->name ?? '-' }}
                                </span>

                            @elseif($peminjaman->status === 'ditolak')

                                <span class="text-rose-600 text-xs font-medium">
                                    Rejected by
                                    {{ $peminjaman->admin->name ?? '-' }}
                                </span>

                            @else

                                <span class="text-slate-400 text-xs">
                                    Belum diproses
                                </span>

                            @endif

                        </td>

                        <td class="px-5 py-4">

                            @if($peminjaman->status === 'pending')

                                <div class="flex justify-center gap-2">

                                    <form
                                        action="{{ route('peminjaman.approve', $peminjaman->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="bg-emerald-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                            Approve
                                        </button>

                                    </form>


                                    <form
                                        action="{{ route('peminjaman.reject', $peminjaman->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                            Tolak
                                        </button>

                                    </form>

                                </div>

                            @else

                                <span class="text-slate-400 text-xs">
                                    -
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-10 text-slate-400">

                            Belum ada data peminjaman.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection