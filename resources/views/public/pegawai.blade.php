@extends('layouts.navbar')

@section('title', 'Data Pegawai')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">
                Data Pegawai
            </h2>

            <p class="text-xs text-slate-500 mt-1">
                Kelola data pegawai yang dapat melakukan peminjaman barang.
            </p>
        </div>

        {{-- Tombol Tambah Pegawai --}}
        <button
            type="button"
            onclick="toggleFormPegawai()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm transition">
            + Tambah Pegawai
        </button>
    </div>


    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700
                    px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- FORM TAMBAH PEGAWAI --}}
    <div
        id="formTambahPegawai"
        class="hidden bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">

        <div class="flex justify-between items-center mb-5">

            <div>
                <h3 class="font-bold text-slate-800 text-sm">
                    Tambah Data Pegawai
                </h3>

                <p class="text-xs text-slate-500 mt-1">
                    Masukkan data pegawai secara manual.
                </p>
            </div>

            <button
                type="button"
                onclick="toggleFormPegawai()"
                class="text-slate-400 hover:text-red-500 text-lg transition">
                ✕
            </button>

        </div>


        <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Nama *
                    </label>

                    <input
                        type="text"
                        name="nama"
                        placeholder="Contoh: John Doe"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl
                               border border-slate-200 focus:outline-none
                               focus:border-blue-500 focus:bg-white transition">
                </div>


                {{-- NIP --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        NIP *
                    </label>

                    <input
                        type="text"
                        name="nip"
                        placeholder="Contoh: 00000000"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl
                               border border-slate-200 focus:outline-none
                               focus:border-blue-500 focus:bg-white transition">
                </div>


                {{-- Jabatan --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Jabatan *
                    </label>

                    <input
                        type="text"
                        name="jabatan"
                        placeholder="Contoh: Manager, Staff..."
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl
                               border border-slate-200 focus:outline-none
                               focus:border-blue-500 focus:bg-white transition">
                </div>


                {{-- Lokasi Gedung --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Lokasi Gedung *
                    </label>

                    <select
                        name="lokasi_gedung"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl
                               border border-slate-200 focus:outline-none
                               focus:border-blue-500 focus:bg-white transition">

                        <option value="">-- Lokasi Gedung --</option>
                        <option value="ADB">ADB</option>
                        <option value="Control Room 1-4">Control Room 1-4</option>
                        <option value="Control Room 5-7">Control Room 5-7</option>
                        <option value="JBC">JBC</option>
                        <option value="Gedung Batubara">Gedung Batubara</option>
                        <option value="Lainnya">Lainnya</option>

                    </select>
                </div>


                {{-- Ruangan --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">
                        Ruangan *
                    </label>

                    <input
                        type="text"
                        name="ruangan"
                        placeholder="Ruangan Divisi SIS"
                        required
                        class="w-full px-3 py-2 text-xs bg-slate-50 rounded-xl
                               border border-slate-200 focus:outline-none
                               focus:border-blue-500 focus:bg-white transition">
                </div>

            </div>


            {{-- Tombol --}}
            <div class="flex justify-end space-x-2 pt-4">

                <button
                    type="button"
                    onclick="toggleFormPegawai()"
                    class="px-4 py-2 rounded-xl text-xs font-semibold
                           text-slate-500 hover:bg-slate-100 transition">
                    Batal
                </button>

                <button
                    type="reset"
                    class="px-4 py-2 rounded-xl text-xs font-semibold
                           text-slate-500 hover:bg-slate-100 transition">
                    Reset
                </button>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white
                           px-5 py-2 rounded-xl text-xs font-semibold
                           shadow-sm transition">
                    Simpan Data Pegawai
                </button>

            </div>

        </form>

    </div>


    {{-- IMPORT EXCEL --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">

        <h3 class="font-bold text-slate-800 text-sm">
            Import Data Pegawai
        </h3>

        <p class="text-xs text-slate-500 mt-1 mb-4">
            Upload file Excel dengan kolom:
            nama, nip, jabatan, lokasi_gedung, ruangan
        </p>

        <form
            action="{{ route('pegawai.import') }}"
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


    {{-- TABEL PEGAWAI --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="p-5 border-b border-slate-100">

            <h3 class="font-bold text-slate-800 text-sm">
                Daftar Pegawai
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left text-xs">

                <thead class="bg-slate-50 text-slate-500 uppercase">

                    <tr>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">NIP</th>
                        <th class="px-5 py-3">Jabatan</th>
                        <th class="px-5 py-3">Lokasi Gedung</th>
                        <th class="px-5 py-3">Ruangan</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($pegawai as $item)

                        <tr>

                            <td class="px-5 py-3">
                                {{ $item->id }}
                            </td>

                            <td class="px-5 py-3 font-semibold">
                                {{ $item->nama }}
                            </td>

                            <td class="px-5 py-3">
                                {{ $item->nip }}
                            </td>

                            <td class="px-5 py-3">
                                {{ $item->jabatan }}
                            </td>

                            <td class="px-5 py-3">
                                {{ $item->lokasi_gedung }}
                            </td>

                            <td class="px-5 py-3">
                                {{ $item->ruangan }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="6"
                                class="px-5 py-10 text-center text-slate-400">
                                Belum ada data pegawai.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- JAVASCRIPT --}}
<script>
    function toggleFormPegawai() {
        const form = document.getElementById('formTambahPegawai');

        form.classList.toggle('hidden');
    }
</script>

@endsection