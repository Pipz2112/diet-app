<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutrition')->insert([
            ['name' => 'Calories', 'unit' => 'kcal'],
            ['name' => 'Protein', 'unit' => 'g'],
            ['name' => 'Fat', 'unit' => 'g'],
            ['name' => 'Carbohydrates', 'unit' => 'g'],
            ['name' => 'Fiber', 'unit' => 'g'],
        ]);
    }
}
