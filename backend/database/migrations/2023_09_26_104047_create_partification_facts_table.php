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
        Schema::create('partification_facts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('category');
            $table->timestamps();

            $table->foreignId('event_id');
            $table->foreignId('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partification_facts');
    }
};
