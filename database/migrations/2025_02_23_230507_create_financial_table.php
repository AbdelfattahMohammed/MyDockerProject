<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('financial', function (Blueprint $table) {
            $table->id(); // Report ID
            $table->enum('department', ['IT', 'HR', 'Finance', 'Marketing', 'Sales'])->default('IT');
            $table->year('year');
            $table->decimal('revenue', 15, 2);
            $table->decimal('expenses', 15, 2);
            $table->decimal('profit', 15, 2)->storedAs('revenue - expenses'); // Auto-calculated
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('financial');
    }
};
