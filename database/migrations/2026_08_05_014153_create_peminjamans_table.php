<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan')->unique();
            $table->string('unit_kerja')->unique();
            $table->string('lokasi_ruangan')->unique();
            $table->string('kode_peminjaman')->unique();
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->date('tgl_pengajuan');
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_kembali_rencana')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'dipinjam', 'selesai'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};