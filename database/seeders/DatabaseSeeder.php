<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          // Create an admin user
          User::create([
            'name' => 'admin',
            'email' => 'admin@themesbrand.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'email_verified_at' => '2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
