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
            $table->id();
            $table->string('name');
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('year');
            $table->unsignedBigInteger('department_id');
            $table->decimal('gpa', 3, 2);
            $table->integer('attendance')->default(0);
            $table->integer('absence')->default(0);
            $table->text('address');
            $table->string('phone')->unique();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
