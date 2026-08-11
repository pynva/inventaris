<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },

                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#0284c7',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>


<body class="h-screen overflow-hidden bg-slate-50">

<div class="flex h-screen">


    <!-- ================= SIDEBAR ================= -->

    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between flex-shrink-0 border-r border-slate-800 z-20">

        <div class="p-5">

            <!-- Brand -->
            <div class="flex items-center space-x-3 mb-8 px-2">

                <div class="bg-gradient-to-tr from-amber-500 to-amber-400 p-2.5 rounded-xl text-slate-900 shadow-lg shadow-amber-500/20 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2.5"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>

                    </svg>

                </div>

                <div>
                    <h1 class="font-bold text-white text-base tracking-wide leading-tight">
                        Judulnya di sini
                    </h1>

                    <span class="text-[10px] text-amber-400 font-bold tracking-widest uppercase">
                        Manajemen Inventaris
                    </span>
                </div>

            </div>


            <!-- Navigation -->
            <nav class="space-y-6">

                <!-- Main Menu -->
                <div>

                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider px-3 mb-2">
                        Main Menu
                    </p>

                    <div class="space-y-1">

                        <a href="{{ route('dashboard') }}"
                           class="flex items-center space-x-3 bg-blue-600 text-white px-3.5 py-2.5 rounded-xl font-semibold text-sm shadow-lg shadow-blue-600/30">

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>

                            </svg>

                            <span>Dashboard</span>

                        </a>

                    </div>

                </div>


                <!-- Master Data -->
                <div>

                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider px-3 mb-2">
                        Master Data
                    </p>

                    <div class="space-y-1">

                        <a href="{{ route('pegawai.index') }}"
                           class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-3.5 py-2.5 rounded-xl text-sm font-medium group">

                            <div class="flex items-center space-x-3">

                                <span>Data Pegawai</span>

                            </div>
                            <span>›</span>
                        </a>


                        <a href="{{ route('barang.index') }}"
                           class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-3.5 py-2.5 rounded-xl text-sm font-medium group">

                            <div class="flex items-center space-x-3">

                                <span>Data Barang / Stok</span>

                            </div>

                            <span>›</span>

                        </a>

                    </div>

                </div>


                <!-- Transaksi -->
                <div>

                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider px-3 mb-2">
                        Transaksi
                    </p>

                    <div class="space-y-1">

                        <a href="{{ route('peminjaman.index') }}"
                        class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-3.5 py-2.5 rounded-xl text-sm font-medium">

                            <span>Data Peminjaman</span>
                            <span>›</span>
                        </a>


                        <a href="{{ route('pengembalian.index') }}"
                           class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-3.5 py-2.5 rounded-xl text-sm font-medium">

                            <span>Data Pengembalian</span>

                            <span>›</span>

                        </a>

                    </div>

                </div>

                <!--Activity Log-->
                    <div class="space-y-1">

                         <a href="{{ route('log-activity') }}"
                           class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-3.5 py-2.5 rounded-xl text-sm font-medium">

                            <span>Log Aktivitas</span>
                            
                            <span>›</span>
                          </a>

                    </div>

            </nav>

        </div>


        <!-- Profile -->
                <div>

                    <div class="space-y-1">

                        <a href="#"
                           class="flex items-center justify-between text-slate-400 hover:bg-slate-800/80 hover:text-white px-9 py-5 rounded-xl text-sm font-medium">

                            <span>Profile</span>

                            <span>›</span>

                        </a>


        <!-- Logout -->
        <div class="p-4 border-t border-slate-800">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit"
                        class="w-full flex items-center space-x-3 text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 px-3 py-2.5 rounded-xl font-medium text-sm">

                    <span>Keluar / Logout</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================= KONTEN KANAN ================= -->

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-50">


        <!-- TOPBAR -->
        <header class="bg-white border-b border-slate-200 px-8 py-3.5 flex justify-between items-center z-10">

            <div class="flex items-center space-x-4">

                <button class="text-slate-500 hover:text-slate-700 p-1 rounded-lg hover:bg-slate-100">

                    ☰

                </button>

                <div class="relative hidden sm:block">

                    <input type="text"
                           placeholder="Cari barang, pegawai..."
                           class="w-64 pl-4 pr-4 py-1.5 text-xs bg-slate-100 rounded-lg border border-transparent focus:border-blue-500 focus:bg-white focus:outline-none">

                </div>

            </div>


            <div class="flex items-center space-x-4">

                <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-full">

                    🔔

                </button>

                <div class="h-6 w-px bg-slate-200"></div>

                <div class="flex items-center space-x-3">

                    <div class="w-9 h-9 rounded-full bg-slate-800 text-amber-400 flex items-center justify-center font-bold text-xs">

                        {{ strtoupper(substr(Auth::user()->name ?? 'VA', 0, 2)) }}

                    </div>

                    <div class="text-left hidden md:block">

                        <p class="font-semibold text-xs text-slate-800">
                            {{ Auth::user()->name ?? 'Vio Amanda' }}
                        </p>

                        <span class="text-[10px] text-slate-400">
                            Administrator
                        </span>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================= ISI HALAMAN ================= -->

        @yield('content')


    </main>

</div>

</body>

</html>