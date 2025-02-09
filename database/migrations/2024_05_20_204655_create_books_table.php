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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->uuid('author_id')->index();
            $table->uuid('category_id')->index();
            $table->uuid('publishing_company_id')->index();
            $table->integer('number_of_copies');
            $table->integer('year_of_publication');
            $table->text('image_path');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')->onDelete('cascade');

            $table->foreign('author_id')
            ->references('id')
            ->on('authors')->onDelete('cascade');

            $table->foreign('publishing_company_id')
            ->references('id')
            ->on('publishing_companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('book_returns');
        Schema::dropIfExists('borrowed_books');
        Schema::dropIfExists('books');
    }
};
