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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("perusahaan_id")->constrained("perusahaans")->cascadeOnDelete();
            $table->foreignId("jurusan_id")->constrained("jurusans")->cascadeOnDelete();
            $table->string("judul_lowongan");
            $table->integer("kuota");
            $table->text("deskripsi_lowongan")->nullable();
            $table->enum("status",["tersedia","penuh"])->default("tersedia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
