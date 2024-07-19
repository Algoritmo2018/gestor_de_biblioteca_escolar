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
        Schema::create('traffic_tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('borrowed_book_id')->index();
            $table->uuid('student_id')->index();
            $table->integer('debt');
            $table->string('state');
            $table->timestamps();

            $table->foreign('borrowed_book_id')
            ->references('id')
            ->on('borrowed_books');


            $table->foreign('student_id')
            ->references('id')
            ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_tickets');
    }
};
