<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SectionSeeder::class,
            SchoolYearSeeder::class,
            RoleSeeder::class,
            LevelSeeder::class,
            UserSeeder::class,
            PaymentUtilitiesSeeder::class,
            RequirementsSeeder::class,
            BranchUtilitySeeder::class,
            BranchSeeder::class,
        ]);
    }
}
