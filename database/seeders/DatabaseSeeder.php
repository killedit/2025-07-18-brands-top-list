<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
        ['email' => 'test@example.com'],
        [
            'name' => 'Test User',
            'email_verified_at' => now(),
            'password' => bcrypt('test'),
            'remember_token' => Str::random(10),
        ]);

        $this->call(BrandSeeder::class);
    }
}
