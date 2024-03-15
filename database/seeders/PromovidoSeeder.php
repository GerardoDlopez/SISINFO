<?php

namespace Database\Seeders;

use App\Models\Promovido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromovidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promovido::factory(30000)->create();
    }
}
