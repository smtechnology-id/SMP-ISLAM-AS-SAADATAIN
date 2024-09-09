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
        Schema::create('additionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('kode_pendaftaran');
            $table->string('masuk_sebagai');
            $table->string('asal_sekolah');
            $table->string('lulusan_tahun');
            $table->string('no_sttb');
            $table->string('nisn');
            $table->string('no_peserta_uasbn');
            $table->string('tanggal_diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additionals');
    }
};
