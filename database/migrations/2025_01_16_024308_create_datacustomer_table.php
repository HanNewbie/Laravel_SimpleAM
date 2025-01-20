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
        Schema::create('datacustomer', function (Blueprint $table) {
            $table->string('NamaCust', 255)->nullable();
            $table->integer('NoBilling')->primary();
            $table->integer('NIPNAS')->nullable();
            $table->string('AlamatCust', 255)->nullable();
            $table->string('NamaPIC', 255)->nullable();
            $table->string('NoHPPIC', 20)->nullable();
            $table->integer('NIKAM')->nullable();
            $table->string('EmailCust', 55)->nullable();

            // Foreign key constraint
            $table->foreign('NIKAM')->references('NIKAM')->on('accountmanager')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datacustomer');
    }
};
