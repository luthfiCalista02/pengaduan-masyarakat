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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->string('nama_masyarakat');
            $table->string('nik');
            $table->string('judul_pengaduan');
            $table->text('isi_pengaduan');
            $table->date('waktu');
            $table->text('lokasi');
            $table->string('lampiran')->nullable(); // Bisa null jika tidak ada lampiran
            $table->enum('status', ['menunggu', 'proses', 'selesai'])->default('menunggu');
            $table->timestamps();

            // Foreign key untuk nik
            $table->foreign('nik')->references('nik')->on('masyarakat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
