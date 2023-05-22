<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

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
            NewStudentSeeder::class,
            SubjectsSeeder::class
        ]);
    }
}
