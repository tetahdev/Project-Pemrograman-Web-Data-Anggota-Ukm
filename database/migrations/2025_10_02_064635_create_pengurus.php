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
        Schema::create('pengurus', function (Blueprint $table) {
        $table->id();
        $table->foreignId('anggota_id')->constrained('anggota')->onDelete('cascade'); 
        $table->foreignId('divisi_id')->constrained('divisi')->onDelete('cascade'); 
        $table->string('jabatan', 100); // contoh: Ketua, Wakil, Sekretaris
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};
