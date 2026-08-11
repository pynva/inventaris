@extends('layouts.navbar')

@section('content')

<!-- Area Scroll Utama -->
<div class="flex-1 overflow-y-auto p-8 space-y-8">

    <!-- Page Title & Export Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                Master Data Barang
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Tambah, import_request_variables, dan kelola aset perangkat IT / operasional PLTU.
            </p>
        </div>

        <div class="flex items-center space-x-3">

           {{-- IMPORT EXCEL --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">

        <h3 class="font-bold text-slate-800 text-sm">
            Import Data Barang
        </h3>

        <p class="text-xs text-slate-500 mt-1 mb-4">
            Upload file Excel dengan kolom:
            kode_barang, hostname, merk, jenis, warna, sn, spesifikasi, os, office, kepemilikan, status
        </p>

        <form
            action="{{ route('barang.import') }}"
            method="POST"
            enctype="multipart/form-data"
            class="flex flex-col md:flex-row gap-3">

            @csrf

            <input
                type="file"
                name="file"
                accept=".xlsx,.xls,.csv"
                required
                class="text-xs border border-slate-200 rounded-xl p-2 bg-slate-50">

            <button
                type="submit"
                class="bg-emerald-600 hover:bg-emerald-700
                       text-white px-5 py-2 rounded-xl
                       text-xs font-semibold">

                Import Excel

            </button>

        </form>

    </div>

            <!-- Tambah Barang -->
            <button
                onclick="document.getElementById('form-tambah-barang').classList.toggle('hidden')"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm shadow-blue-600/20 transition flex items-center space-x-2">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>

                <span> Tambah Barang Manual</span>
            </button>
        </div>
    </div>


    <!-- FORM TAMBAH BARANG -->
    <div id="form-tambah-barang"
         class="hidden bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">

        <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100">

            <h3 class="font-bold text-slate-800 text-sm flex items-center space-x-2">
                <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                <span>Form Input Barang Baru</span>
            </h3>

            <span class="text-xs text-slate-400">
                Isi field di bawah secara lengkap
            </span>

        </div>


        <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">

                <!-- Kode Barang -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Kode Barang *
                    </label>

                    <input
                        type="text"
                        name="kode_barang"
                        placeholder="Contoh: BRG-001"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Hostname -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Hostname
                    </label>

                    <input
                        type="text"
                        name="hostname"
                        placeholder="Contoh: PLTU-LAP-04"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Merk -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Merk / Brand *
                    </label>

                    <input
                        type="text"
                        name="merk"
                        placeholder="Lenovo, Dell, HP..."
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Jenis -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Jenis Barang *
                    </label>

                    <select
                        name="jenis"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">

                        <option value="">-- Pilih Kategori --</option>
                        <option value="Laptop">Laptop</option>
                        <option value="PC Desktop">PC Desktop</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Printer">Printer</option>
                        <option value="Scanner">Scanner</option>
                        <option value="Projector">Projector</option>
                        <option value="Network Device">Network Device</option>
                        <option value="UPS">UPS</option>
                        <option value="CCTV">CCTV</option>
                        <option value="Handphone">Handphone</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Lainnya">Lainnya</option>

                    </select>
                </div>


                <!-- Warna -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Warna
                    </label>

                    <input
                        type="text"
                        name="warna"
                        placeholder="Hitam, Silver..."
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Serial Number -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Serial Number (S/N) *
                    </label>

                    <input
                        type="text"
                        name="sn"
                        placeholder="SN123456789"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- OS -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Operating System (O/S)
                    </label>

                    <input
                        type="text"
                        name="os"
                        placeholder="Windows 11 Pro, Linux..."
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Office -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Office License
                    </label>

                    <input
                        type="text"
                        name="office"
                        placeholder="Office 2021 Home & Business"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                </div>


                <!-- Status -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Status Barang *
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">

                        <option value="Ready">Ready</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Rusak">Rusak</option>

                    </select>
                </div>


                <!-- Kepemilikan -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Status Kepemilikan *
                    </label>

                    <select
                        name="kepemilikan"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">

                        <option value="Aset">Aset Perusahaan</option>
                        <option value="Sewa">Sewa / Rental</option>

                    </select>
                </div>


                <!-- Spesifikasi -->
                <div class="md:col-span-2 lg:col-span-2">

                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Spesifikasi Detail
                    </label>

                    <input
                        type="text"
                        name="spesifikasi"
                        placeholder="Intel i7 Gen 12, RAM 16GB, SSD 512GB..."
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 focus:bg-white transition">

                </div>

            </div>


            <div class="flex justify-end space-x-2 pt-4">

                <button
                    type="reset"
                    class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:bg-slate-100 transition">
                    Reset
                </button>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl text-xs font-semibold shadow-sm transition">
                    Simpan Data Barang
                </button>

            </div>

        </form>
    </div>


    <!-- TABEL LIST BARANG -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">

        <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <h3 class="font-bold text-slate-800 text-sm">
                Daftar Inventaris Barang
            </h3>

            <div class="relative">

                <input
                    type="text"
                    placeholder="Cari Kode, S/N, Hostname..."
                    class="pl-8 pr-4 py-1.5 text-xs bg-slate-100 rounded-lg border border-transparent focus:border-blue-500 focus:bg-white focus:outline-none transition-all w-60">

                <svg
                    class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-2"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>

                </svg>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-left text-xs">

                <thead class="bg-slate-50/80 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">

                    <tr>
                        <th class="py-3 px-4 font-semibold">Kode / Hostname</th>
                        <th class="py-3 px-4 font-semibold">Merk & Jenis</th>
                        <th class="py-3 px-4 font-semibold">S/N</th>
                        <th class="py-3 px-4 font-semibold">Spesifikasi & OS</th>
                        <th class="py-3 px-4 font-semibold">Milik</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                        <th class="py-3 px-4 font-semibold text-center">Aksi</th>
                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($barang as $item)

        <tr class="hover:bg-slate-50/80 transition">

            <!-- Kode / Hostname -->
            <td class="py-3 px-4">
                <p class="font-bold text-slate-800">
                    {{ $item->kode_barang }}
                </p>

                <span class="text-[10px] text-slate-400">
                    {{ $item->hostname ?? '-' }}
                </span>
            </td>


                        <!-- Merk & Jenis -->
            <td class="py-3 px-4">
                <p class="font-medium text-slate-800">
                    {{ $item->merk }}
                </p>

                <span class="text-[10px] text-slate-400">
                    {{ $item->jenis }}
                    @if($item->warna)
                        ({{ $item->warna }})
                    @endif
                </span>
            </td>



                        <!-- Serial Number -->
            <td class="py-3 px-4 text-slate-600 font-mono">
                {{ $item->sn }}
            </td>

            <!-- Spesifikasi & OS -->
            <td class="py-3 px-4">

                <p class="text-slate-700 truncate w-48">
                    {{ $item->spesifikasi ?? '-' }}
                </p>

                <span class="text-[10px] text-slate-400">
                    {{ $item->os ?? '-' }}

                    @if($item->office)
                        • {{ $item->office }}
                    @endif
                </span>

            </td>


                        <!-- Kepemilikan -->
            <td class="py-3 px-4">

                @if($item->kepemilikan == 'Aset')

                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-700">
                        Aset
                    </span>

                @else

                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-amber-50 text-amber-700">
                        Sewa
                    </span>

                @endif

            </td>

                        <!-- Status -->
            <td class="py-3 px-4">

                @if($item->status == 'Ready')

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        Ready
                    </span>

                @elseif($item->status == 'Dipinjam')

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                        Dipinjam
                    </span>

                @elseif($item->status == 'Maintenance')

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                        Maintenance
                    </span>

                @else

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                        {{ $item->status }}
                    </span>

                @endif

            </td>

                        <!-- Aksi -->
            <td class="py-3 px-4 text-center">

                <div class="flex items-center justify-center space-x-2">

                    <!-- Edit -->
                    <button
                        onclick='openEditModal(@json($item))'
                        class="p-1 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                        title="Edit Data">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                        </svg>

                    </button>


                                <!-- Hapus -->
                    <button
                        onclick="openDeleteModal({{ $item->id }}, '{{ $item->kode_barang }}')"
                        class="p-1 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition"
                        title="Hapus Data">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 01-1-1h-4a1 1 0 01-1 1v3M4 7h16"/>

                        </svg>

                    </button>

                </div>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="7" class="py-10 text-center">

                <div class="flex flex-col items-center">

                    <svg class="w-10 h-10 text-slate-300 mb-3"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>

                    </svg>

                    <p class="text-sm font-semibold text-slate-500">
                        Belum ada data barang
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Silakan tambahkan barang terlebih dahulu.
                    </p>

                </div>

            </td>
        </tr>

    @endforelse

</tbody>

            </table>

        </div>

    </div>


<!-- ================= MODAL EDIT ================= -->

<div id="modal-edit"
     class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-3xl p-6 m-4 max-h-[90vh] overflow-y-auto">

        <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100">

            <h3 class="font-bold text-slate-800 text-base flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-amber-500 rounded-full"></span>
                <span>Edit Data Barang</span>
            </h3>

            <button
                onclick="closeEditModal()"
                class="text-slate-400 hover:text-slate-600 transition">

                ✕

            </button>

        </div>


        <form id="form-edit-barang" action="" method="POST" class="space-y-4">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Kode Barang *
                    </label>

                    <input
                        type="text"
                        id="edit-kode"
                        name="kode_barang"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Hostname
                    </label>

                    <input
                        type="text"
                        id="edit-hostname"
                        name="hostname"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Merk / Brand *
                    </label>

                    <input
                        type="text"
                        id="edit-merk"
                        name="merk"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Jenis Barang *
                    </label>

                    <select
                        id="edit-jenis"
                        name="jenis"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">

                        <option value="Laptop">Laptop</option>
                        <option value="PC Desktop">PC Desktop</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Printer">Printer</option>
                        <option value="Scanner">Scanner</option>
                        <option value="Projector">Projector</option>
                        <option value="Network Device">Network Device</option>
                        <option value="UPS">UPS</option>
                        <option value="CCTV">CCTV</option>
                        <option value="Handphone">Handphone</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Lainnya">Lainnya</option>

                    </select>
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Warna
                    </label>

                    <input
                        type="text"
                        id="edit-warna"
                        name="warna"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Serial Number (S/N) *
                    </label>

                    <input
                        type="text"
                        id="edit-sn"
                        name="sn"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Operating System
                    </label>

                    <input
                        type="text"
                        id="edit-os"
                        name="os"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Office License
                    </label>

                    <input
                        type="text"
                        id="edit-office"
                        name="office"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Status Barang *
                    </label>

                    <select
                        id="edit-status"
                        name="status"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">

                        <option value="Ready">Ready</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Rusak">Rusak</option>

                    </select>
                </div>


                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Status Kepemilikan *
                    </label>

                    <select
                        id="edit-kepemilikan"
                        name="kepemilikan"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">

                        <option value="Aset">Aset Perusahaan</option>
                        <option value="Sewa">Sewa / Rental</option>

                    </select>
                </div>


                <div class="md:col-span-2">

                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Spesifikasi Detail
                    </label>

                    <input
                        type="text"
                        id="edit-spesifikasi"
                        name="spesifikasi"
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl border border-slate-200">

                </div>

            </div>


            <div class="flex justify-end space-x-2 pt-4 border-t border-slate-100">

                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:bg-slate-100">
                    Batal
                </button>

                <button
                    type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-slate-900 px-5 py-2 rounded-xl text-xs font-bold">
                    Perbarui Data
                </button>

            </div>

        </form>

    </div>

</div>


<!-- ================= MODAL DELETE ================= -->

<div id="modal-delete"
     class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md p-6 m-4">

        <div class="flex items-center space-x-3 mb-4">

            <div class="bg-rose-100 p-2.5 rounded-full text-rose-600">

                <svg class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>

                </svg>

            </div>

            <div>

                <h3 class="font-bold text-slate-800 text-base">
                    Hapus Data Barang
                </h3>

                <p class="text-xs text-slate-500">
                    Tindakan ini tidak dapat dibatalkan.
                </p>

            </div>

        </div>


        <p class="text-xs text-slate-600 mb-6">

            Apakah Anda yakin ingin menghapus data barang

            <span
                id="delete-kode-barang"
                class="font-bold text-slate-900">
            </span>?

        </p>


        <form
            id="form-delete-barang"
            action=""
            method="POST"
            class="flex justify-end space-x-2">

            @csrf
            @method('DELETE')

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:bg-slate-100">
                Batal
            </button>

            <button
                type="submit"
                class="bg-rose-600 hover:bg-rose-700 text-white px-5 py-2 rounded-xl text-xs font-semibold">
                Ya, Hapus Data
            </button>

        </form>

    </div>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

function openEditModal(data) {

    document.getElementById('form-edit-barang').action =
        `/barang/${data.id}`;

    document.getElementById('edit-kode').value =
        data.kode_barang ?? '';

    document.getElementById('edit-hostname').value =
        data.hostname ?? '';

    document.getElementById('edit-merk').value =
        data.merk ?? '';

    document.getElementById('edit-jenis').value =
        data.jenis ?? '';

    document.getElementById('edit-warna').value =
        data.warna ?? '';

    document.getElementById('edit-sn').value =
        data.sn ?? '';

    document.getElementById('edit-os').value =
        data.os ?? '';

    document.getElementById('edit-office').value =
        data.office ?? '';

    document.getElementById('edit-status').value =
        data.status ?? '';

    document.getElementById('edit-kepemilikan').value =
        data.kepemilikan ?? '';

    document.getElementById('edit-spesifikasi').value =
        data.spesifikasi ?? '';

    document.getElementById('modal-edit')
        .classList.remove('hidden');
}


function closeEditModal() {

    document.getElementById('modal-edit')
        .classList.add('hidden');

}


function openDeleteModal(id, kodeBarang) {

    document.getElementById('form-delete-barang').action =
        `/barang/${id}`;

    document.getElementById('delete-kode-barang').textContent =
        kodeBarang;

    document.getElementById('modal-delete')
        .classList.remove('hidden');

}


function closeDeleteModal() {

    document.getElementById('modal-delete')
        .classList.add('hidden');

}

</script>

@endsection