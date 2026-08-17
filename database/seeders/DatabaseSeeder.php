<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@tastyfood.com',
        ], [
            'name' => 'Admin Tasty',
            'password' => bcrypt('tastyfoods123'),
            'role' => 'admin',
        ]);
    }
}
