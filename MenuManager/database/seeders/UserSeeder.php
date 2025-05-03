<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin',
            'admin_type' => 'Master',
            'password' => Hash::make('123456'), 
        ]);

        UserProfile::create([
            'users_id' => $user->id,
            'name' => 'Admin',
            'avatar_image' => 'default_image',
        ]);
    }
}
