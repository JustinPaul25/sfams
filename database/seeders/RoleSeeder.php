<?php

namespace Database\Seeders;

use App\Types\RoleType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => RoleType::ADMINISTRATOR]);
        Role::create(['name' => RoleType::STAFF]);
        Role::create(['name' => RoleType::STUDENT]);
    }
}
