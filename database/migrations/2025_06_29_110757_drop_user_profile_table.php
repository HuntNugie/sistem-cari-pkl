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
        schema::dropIfExists('user_profiles');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->onDelete('set null');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('foto')->nullable();
            $table->string('kelas')->nullable();
            $table->string('jurusan')->nullable();
            $table->timestamps();
        });
    }
};
