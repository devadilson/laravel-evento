<?php

namespace Database\Seeders;

use App\Models\Campu;
use Illuminate\Database\Seeder;

class CampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campu::factory()->count(5)->create();
    }
}
