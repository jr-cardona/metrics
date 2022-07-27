<?php

namespace Database\Seeders;

use App\Models\Dimension;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Dimension::create(['name' => 'Agresión física', 'code' => 'AF']);
        Dimension::create(['name' => 'Agresión verbal', 'code' => 'AV']);
        Dimension::create(['name' => 'Ira', 'code' => 'IR']);
        Dimension::create(['name' => 'Hostilidad', 'code' => 'HO']);
    }
}
