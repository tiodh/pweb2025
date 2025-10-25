<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi: membuat tabel semesters
     */
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('academic_year');
            $table->integer('order'); // semester ke berapa
            $table->boolean('status')->default(1); // 1 = aktif, 0 = tidak aktif
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi: menghapus tabel semesters
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
