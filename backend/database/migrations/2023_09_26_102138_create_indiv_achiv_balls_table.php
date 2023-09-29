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
        Schema::create('indiv_achiv_balls', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('value');
            $table->timestamps();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('type_indiv_achiv_id');
            $table->foreignId('average_ball_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indiv_achiv_balls');
    }
};
