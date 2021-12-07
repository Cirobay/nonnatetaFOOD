<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('11111111')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Vendor',
            'email' => 'vendor@vendor.com',
            'password' => bcrypt('11111111')
        ])->assignRole('Vendor');

        User::factory(50)->create();
    }
}
