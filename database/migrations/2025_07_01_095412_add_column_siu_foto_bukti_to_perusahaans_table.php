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
        Schema::table('perusahaan_profiles', function (Blueprint $table) {
            $table->string("nomor_izin_usaha")->nullable()->after("nama_perusahaan");
            $table->string("foto_bukti")->nullable()->after("nomor_izin_usaha");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perusahaan_profiles', function (Blueprint $table) {
            $table->dropColumn("nomor_izin_usaha");
            $table->dropColumn("foto_bukti");
        });
    }
};
