<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();

            // Identitas barang
            $table->string('kode_barang')->unique();
            $table->string('hostname')->nullable();

            // Informasi barang
            $table->string('merk');
            $table->string('jenis');
            $table->string('warna')->nullable();

            // Identitas perangkat
            $table->string('sn')->unique();

            // Spesifikasi
            $table->text('spesifikasi')->nullable();
            $table->string('os')->nullable();
            $table->string('office')->nullable();

            // Kepemilikan
            $table->enum('kepemilikan', ['Aset', 'Sewa'])->default('Aset');

            // Status barang
            $table->enum('status', [
                'Ready',
                'Dipinjam',
                'Rusak',
                'Maintenance'
            ])->default('Ready');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};