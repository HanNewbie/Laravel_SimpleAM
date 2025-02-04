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
        Schema::create('accountmanager', function (Blueprint $table) {
            $table->integer('NIKAM')->primary();
            $table->string('NamaAM', 255)->nullable();
            $table->integer('IdSegmen')->nullable();
            $table->string('NoHP', 13)->nullable();
            $table->string('Email', 55)->nullable();
            $table->string('IdTelegram', 55)->nullable();

            $table->foreign('IdSegmen')->references('IdSegmen')->on('segmen')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountmanager');
    }
};
