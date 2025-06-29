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
            $table->enum('status',['terkonfirmasi','belum terkonfirmasi'])
                  ->default('belum terkonfirmasi')
                  ->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perusahaan_profiles', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
