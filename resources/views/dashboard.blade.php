@extends('layouts.navbar')

@section('title', 'Dashboard')

@section('content')

<!-- Area Scroll Utama -->
<div class="flex-1 overflow-y-auto p-8 space-y-8">

    <!-- Page Title Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                Dashboard
            </h2>

            <p class="text-xs text-slate-500 mt-0.5">
                Monitoring stok inventaris dan aktivitas peminjaman barang.
            </p>
        </div>
    </div>


    <!-- GRID KARTU INDIKATOR -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- Total Barang -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Total Barang
                    </p>

                    <h3 class="text-2xl font-bold text-slate-900 mt-2">
                        {{ $totalBarang }}
                    </h3>
                </div>

                <div class="p-3 bg-blue-50 text-grey-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>

            </div>

        </div>


        <!-- Barang Ready -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Barang Ready
                    </p>

                    <h3 class="text-2xl font-bold text-emerald-600 mt-2">
                        {{ $barangReady }}
                    </h3>
                </div>

                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

            </div>

        </div>


        <!-- Sedang Dipinjam -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Sedang Dipinjam
                    </p>

                    <h3 class="text-2xl font-bold text-blue-600 mt-2">
                        {{ $sedangDipinjam }}
                    </h3>
                </div>

                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>

            </div>

        </div>


        <!-- Maintenance -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Maintenance
                    </p>

                    <h3 class="text-2xl font-bold text-amber-600 mt-2">
                        {{ $maintenance }}
                    </h3>
                </div>

                <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-.37 2.37a1.724 1.724 0 00-2.37 2.37 1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31-2.37-2.37-.996.608-2.296.07-2.572-1.065z"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

            </div>

        </div>

<!-- Rusak -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Rusak
                    </p>

                    <h3 class="text-2xl font-bold text-red-600 mt-2">
                        {{ $rusak }}
                    </h3>
                </div>

                <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>

            </div>

        </div>


<!-- Barang Aset -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Barang Aset
                    </p>

                    <h3 class="text-2xl font-bold text-yellow-600 mt-2">
                        {{ $barangAset }}
                    </h3>
                </div>

                <div class="p-3 bg-yellow-50 text-yellow-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>

            </div>

        </div>

<!-- Barang Sewa/Koperasi-->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all">

            <div class="flex justify-between items-start">

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        Barang Sewa/Koperasi
                    </p>

                    <h3 class="text-2xl font-bold text-purple-600 mt-2">
                        {{ $barangSewa }}
                    </h3>
                </div>

                <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>

            </div>

        </div>

    </div>

    <!-- SECTION GRAFIK -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-3 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">

            <div class="flex justify-between items-center mb-4">

                <div>
                    <h3 class="font-bold text-slate-800 text-sm">
                        Grafik Peminjaman Barang
                    </h3>

                    <p class="text-xs text-slate-400">
                        Aktivitas peminjaman bulanan
                    </p>
                </div>

                <select class="border border-slate-300 rounded-lg text-xs px-4 py-1.5 text-slate-600 bg-slate-50 focus:outline-none focus:border-blue-500">
                    <option>Tahun 2026</option>
                    <option>Tahun 2025</option>
                </select>

            </div>

            <div class="h-64 relative w-full">
                <canvas id="peminjamanChart"></canvas>
            </div>

        </div>

    </div>

</div>


<script>
document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById('peminjamanChart');

    if (!canvas) {
        return;
    }

    const ctx = canvas.getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 300);

    gradient.addColorStop(0, 'rgba(2, 132, 199, 0.25)');
    gradient.addColorStop(1, 'rgba(2, 132, 199, 0.0)');

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr',
                'Mei', 'Jun', 'Jul', 'Agu',
                'Sep', 'Okt', 'Nov', 'Des'
            ],

            datasets: [{
                label: 'Total Peminjaman',

                data: [
                    0, 0, 0, 0,
                    0, 0, 0, 0,
                    0, 0, 0, 0
                ],

                borderColor: '#0284c7',
                borderWidth: 2.5,
                backgroundColor: gradient,
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#0284c7',
                pointHoverRadius: 6
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },

                    ticks: {
                        font: {
                            size: 11
                        },
                        color: '#94a3b8'
                    }
                },

                y: {
                    border: {
                        dash: [4, 4]
                    },

                    grid: {
                        color: '#f1f5f9'
                    },

                    ticks: {
                        font: {
                            size: 11
                        },
                        color: '#94a3b8'
                    }
                }
            }
        }
    });

});
</script>

@endsection