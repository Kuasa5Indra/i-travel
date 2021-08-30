<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This password is unsafe. Make sure you change your password after seeding
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@email.net',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin456'),
            'roles' => 'ADMIN'
        ]);
    }
}
