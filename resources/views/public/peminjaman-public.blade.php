<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Barang - PLTU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto w-full bg-white rounded-xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Form Peminjaman Barang UBP Suralaya
        </h2>
        <p class="text-sm text-gray-500 text-center mb-6"></p>

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pinjam.store') }}" method="POST" class="space-y-4">
            @csrf

           <!-- Pilih Pegawai -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pegawai / NIP</label>
                <select name="pegawai_id" required class="w-full border-gray-300 rounded-lg p-2.5 border focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach($pegawais as $pegawai)
                        <option value="{{ $pegawai->id }}">
                            {{ $pegawai->nama_lengkap }} (NIP: {{ $pegawai->nip }}) - {{ $pegawai->unit_kerja }}
                        </option>
                    @endforeach
                </select>
            </div> 

            <!-- Jabatan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                <select name="jabatan" required class="w-full border-gray-300 rounded-lg p-2.5 border focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($pegawais as $pegawai)
                        <option value="{{ $pegawai->jabatan }}">
                            {{ $pegawai->jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Ruangan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Ruangan</label>
                <select name="ruangan" required class="w-full border-gray-300 rounded-lg p-2.5 border focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach($pegawais as $pegawai)
                        <option value="{{ $pegawai->unit_kerja }}">
                            {{ $pegawai->unit_kerja }}
                        </option>
                    @endforeach
                    </select>
            </div>

            <!-- Pilih Barang -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Barang (Tersedia)</label>
                <select name="barang_id" required class="w-full border-gray-300 rounded-lg p-2.5 border focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">
                            [{{ strtoupper($barang->kategori) }}] {{ $barang->merk_tipe }} - S/N: {{ $barang->no_seri }} ({{ ucfirst($barang->kepemilikan) }})
                        </option>
                    @endforeach
                </select>
            </div>

<!-- Tanggal Peminjaman -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_pinjam" required 
                       value="{{ date('Y-m-d') }}"
                       min="{{ date('Y-m-d') }}"
                       class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200 bg-white">
            </div>
            
        <!-- Tambahkan di bagian atas dalam card form -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('login') }}" class="text-xs text-blue-600 hover:text-blue-800 font-medium bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-200 hover:bg-blue-100 transition">
            </a>
        </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-200">
                Kirim Pengajuan Peminjaman
            </button>
        </form>
    </div>
</body>
</html>