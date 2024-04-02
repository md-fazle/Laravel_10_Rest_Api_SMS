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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Teacher_id');
            $table->string('Name');
            $table->string('Age');
            $table->string('Birth_Date');
            $table->string('Phone');
            $table->string('Email');
            $table->string('Gander');
            $table->string('Department');
            $table->string('Possession');
            $table->string('Address');
            $table->string('Salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
