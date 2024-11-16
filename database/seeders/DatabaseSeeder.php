<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin@123',
            'role' => 'admin'
        ]);

        // DB::table('users')->insert([
        //     'name' => 'customer',
        //     'email' => 'customer@gmail.com',
        //     'password' => 'customer@123',
        //     'role' => 'customer'
        // ]);
    }
}