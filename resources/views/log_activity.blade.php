@extends('layouts.navbar')

@section('content')
<div class="p-6">
    <!-- Header Halaman -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Log Aktivitas</h1>
        <p class="text-slate-500 text-sm mt-1">Pantau dan kelola seluruh riwayat aktivitas serta perubahan data sistem PLTU.</p>
    </div>

    <!-- Main Card Container -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        
        <!-- Header Card & Search Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-base font-semibold text-slate-800">Daftar Riwayat Aktivitas</h2>
            
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" placeholder="Cari Log, User, Aktivitas..." class="pl-9 pr-4 py-2 w-full text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-slate-700">
            </div>
        </div>

        <!-- Tabel Log Aktivitas -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-y border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4">User / Pelaku</th>
                        <th class="py-3 px-4">Aktivitas</th>
                        <th class="py-3 px-4">Modul / Model</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-600">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-3.5 px-4 font-medium text-slate-700 whitespace-nowrap">
                                {{ $log->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3.5 px-4 font-semibold text-slate-800 whitespace-nowrap">
                                {{ $log->causer->name ?? 'System' }}
                            </td>
                            <td class="py-3.5 px-4">
                                @if($log->description == 'created')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-medium rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100">
                                        Tambah Data
                                    </span>
                                @elseif($log->description == 'updated')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-medium rounded-full bg-amber-50 text-amber-600 border border-amber-100">
                                        Perbarui Data
                                    </span>
                                @elseif($log->description == 'deleted')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-medium rounded-full bg-rose-50 text-rose-600 border border-rose-100">
                                        Hapus Data
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-medium rounded-full bg-blue-50 text-blue-600 border border-blue-100">
                                        {{ ucfirst($log->description) }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 font-mono text-xs">
                                {{ class_basename($log->subject_type ?? $log->log_name) }}
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <span class="text-xs text-slate-400 hover:text-blue-600 cursor-pointer">Detail</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-3">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <h3 class="text-base font-semibold text-slate-700">Belum ada data log aktivitas</h3>
                                    <p class="text-sm text-slate-400 mt-1">Aktivitas pengguna dan perubahan data akan dicatat secara otomatis.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection