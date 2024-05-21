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
            $table->uuid('author_id')->index()->nullable();
            $table->uuid('category_id')->index()->nullable();
            $table->uuid('publishing_company_id')->index()->nullable();
            $table->text('content');
            $table->text('image_path');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories');

            $table->foreign('author_id')
            ->references('id')
            ->on('authors');

            $table->foreign('publishing_company_id')
            ->references('id')
            ->on('publishing_companies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
