<?php

namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annonce::factory()
        ->count(100)
        ->create();
    }
}
