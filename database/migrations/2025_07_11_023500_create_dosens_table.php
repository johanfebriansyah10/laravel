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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nidn', 7)->unique();
            $table->string('nama', 50);
            $table->string('gelar', 50)->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('email', 50);
            $table->string('alamat', 70);
            $table->string('no_hp', 20)->nullable();
            $table->string('foto', 50)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
