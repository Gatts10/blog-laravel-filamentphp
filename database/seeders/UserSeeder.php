<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'orlando.carvalho31@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Author 1',
            'email' => 'author1@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Author 2',
            'email' => 'author2@mail.com',
        ]);
    }
}
