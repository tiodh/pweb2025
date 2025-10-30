<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');
            $table->string('name');
            $table->string('dean');
            $table->string('faculty_code');
            $table->timestamps();
            $table->foreign('university_id')->references('id')->on('universities');
        });
    }
    public function down(): void {
        Schema::dropIfExists('faculties');
    }
};