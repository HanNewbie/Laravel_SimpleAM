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
        Schema::create('layanan', function (Blueprint $table) {
            $table->integer('NoBilling')->nullable();
            $table->string('SID', 100)->primary();
            $table->string('ProdName', 100)->nullable();
            $table->string('Bandwidth', 10)->nullable();
            $table->string('Satuan', 10)->nullable();
            $table->integer('Jumlah');
            $table->decimal('NilaiLayanan', 15, 0)->nullable();
            $table->string('Deskripsi', 100)->nullable();

            $table->foreign('NoBilling')->references('NoBilling')->on('datacustomer')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
