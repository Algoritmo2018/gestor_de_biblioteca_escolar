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
        Schema::create('book_returns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('borrowed_book_id')->index();
            $table->uuid('student_id')->index();
            $table->uuid('user_id')->index();
            $table->uuid('book_id')->index(); 
            $table->timestamp('return_date')->nullable();
            $table->text('observation');
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')
            ->on('students');
              $table->foreign('user_id')
            ->references('id')
            ->on('users');
              $table->foreign('book_id')
            ->references('id')
            ->on('books');

            $table->foreign('borrowed_book_id')
            ->references('id')
            ->on('borrowed_books');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_returns');
    }
};
