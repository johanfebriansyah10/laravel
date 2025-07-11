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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('dosen_id');
            $table->string('ruangan', 20);
            $table->string('hari', 10);
            $table->time('jam_mulai');
            $table->time('selesai');
            $table->string('kelas', 10)->nullable();
            $table->year('tahun_ajaran');
            $table->enum('semester', ['genap', 'ganjil']);
            $table->timestamps();

            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
