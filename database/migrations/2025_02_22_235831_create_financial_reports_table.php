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
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');
            $table->decimal('total_budget', 10, 2);
            $table->decimal('expenses', 10, 2);
            $table->decimal('revenue', 10, 2);
            $table->unsignedBigInteger('event_id')->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_reports');
    }
};
