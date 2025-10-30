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
        Schema::create('thesis_supervisors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theses_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->string('role'); 
            $table->string('approval_status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thesis_supervisors');
    }
};
