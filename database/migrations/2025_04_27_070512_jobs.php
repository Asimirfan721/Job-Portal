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
        // migration for jobs table
        Schema::create('jobss', function (Blueprint $table) {  // migration for jobs table
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->text('description');
            $table->string('type');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
