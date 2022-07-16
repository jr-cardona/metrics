<?php

namespace Database\Seeders;

use App\Models\Dimension;
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
        Dimension::create(['name' => 'Agresión física']);
        Dimension::create(['name' => 'Agresión verbal']);
        Dimension::create(['name' => 'Ira']);
        Dimension::create(['name' => 'Hostilidad']);
    }
}
