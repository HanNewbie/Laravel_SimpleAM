<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segmen;

class SegmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Segmen::create([
            'IdSegmen'   => 1,
            'NamaSegmen' => 'DBS',
        ]);

        Segmen::create([
            'IdSegmen'   => 2,
            'NamaSegmen' => 'DGS',
        ]);

        Segmen::create([
            'IdSegmen'   => 3,
            'NamaSegmen' => 'DES',
        ]);
    }
}
