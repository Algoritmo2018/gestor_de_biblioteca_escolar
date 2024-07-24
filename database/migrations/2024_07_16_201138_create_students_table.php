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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('type');
            $table->uuid('course_id')->index()->nullable();
            $table->text('bi')->unique();
            $table->text('residence');
            $table->text('contact');
            $table->text('email')->unique();
            $table->timestamps();

            $table->foreign('course_id')
            ->references('id')
            ->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('borrowed_books');
        Schema::dropIfExists('students');
    }
};
