<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dider',
            'email' => 'random@yahoo.fr',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);

        User::factory()
            ->count(20)
            ->create();
    }
}
