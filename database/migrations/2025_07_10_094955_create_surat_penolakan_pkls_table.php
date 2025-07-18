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
        Schema::create('surat_penolakan_pkls', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lamar_id")->constrained("lamars")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("alasan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_penolakan_pkls');
    }
};
