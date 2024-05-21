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
        Schema::create('frontuser', function (Blueprint $table) {
            $table->id();
            $table->string('org_id');
            $table->string('name');
            $table->string('website');
            $table->string('country');
            $table->text('description');
            $table->string('founded');
            $table->string('industry');
            $table->string('employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontuser');
    }
};
