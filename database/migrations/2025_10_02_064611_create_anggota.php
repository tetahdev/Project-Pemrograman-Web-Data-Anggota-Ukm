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
        Schema::create('anggota', function (Blueprint $table) {
    $table->id();
    $table->string('nim', 50)->unique();
    $table->string('nama', 100);
    $table->string('prodi', 100);
    $table->string('kelas', 50); // contoh: A, B, C, atau nama kelas
    $table->enum('jenis_kelamin', ['L', 'P']); // L = Laki-laki, P = Perempuan
    $table->string('jabatan', 50)->nullable();
    $table->string('foto')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
