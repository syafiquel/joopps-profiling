<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AuthUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
