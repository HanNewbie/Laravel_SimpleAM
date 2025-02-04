<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS ViewALL');

        DB::statement('

        CREATE VIEW ViewALL AS
        SELECT 
            s.NamaSegmen,
            am.NamaAM,
            dc.NamaCust,
            dc.NamaPIC,
            dc.NoHPPIC,
            l.SID,
            dc.NoBilling,
            l.ProdName,
            l.NilaiLayanan,
            k.EndDate
        FROM 
            accountmanager am
        JOIN 
            datacustomer dc ON am.NIKAM = dc.NIKAM
        JOIN 
            kontrak k ON dc.NoBilling = k.NoBilling
        JOIN 
            layanan l ON dc.NoBilling = l.NoBilling
        JOIN 
            segmen s ON am.IdSegmen = s.IdSegmen;
      ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS ViewALL');
    }
};
