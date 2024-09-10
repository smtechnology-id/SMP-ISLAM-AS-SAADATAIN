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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_pendaftaran');
            $table->string('ijazah')->nullable();
            $table->string('skhu')->nullable();
            $table->string('akte_kelahiran')->nullable();
            $table->string('nisn')->nullable();
            $table->string('raport')->nullable();
            $table->string('ktp_orang_tua')->nullable();
            $table->string('surat_kematian')->nullable();
            $table->string('kk')->nullable();
            $table->string('pas_foto_2x3')->nullable();
            $table->string('pas_foto_3x4')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('lain_lain2')->nullable();
            $table->string('lain_lain3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
