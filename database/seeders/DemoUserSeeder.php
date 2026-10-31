<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'johnhenrichdoroteo-ui'],
            [
                'name' => 'John Henrich Doroteo',
                'full_name' => 'John Henrich Doroteo',
                'email' => 'johnhenrichdoroteo@gmail.com',
                'password' => Hash::make(Str::random(40)),
            ],
        );
    }
}
