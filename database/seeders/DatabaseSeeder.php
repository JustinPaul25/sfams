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
            SchoolYearSeeder::class,
            RoleSeeder::class,
            BranchUtilitySeeder::class,
            BranchSeeder::class,
            SectionSeeder::class,
            LevelSeeder::class,
            UserSeeder::class,
            PaymentUtilitiesSeeder::class,
            RequirementsSeeder::class,
        ]);
    }
}
