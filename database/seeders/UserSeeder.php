<?php

namespace Database\Seeders;

use App\Models\User;
use App\Types\RoleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123123'),
        ]);

        $user->assignRole(RoleType::ADMINISTRATOR);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'staff@mail.com',
            'password' => Hash::make('123123'),
        ]);

        $user->assignRole(RoleType::STAFF);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'student@mail.com',
            'password' => Hash::make('123123'),
        ]);

        $user->assignRole(RoleType::STUDENT);
    }
}
