<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->id('id_masyarakat'); // Auto Increment
            $table->string('nik')->unique();
            $table->string('nama_masyarakat');
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('tlp');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakat');
    }
};
