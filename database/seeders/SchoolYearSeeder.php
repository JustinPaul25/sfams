<?php

namespace Database\Seeders;

use App\Models\Enroll;
use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = SchoolYear::create([
            'from' => 2021,
            'to' => 2022,
            'status' => 'active'
        ]);

        Enroll::create([
            'school_year_id' => $school->id,
            'students' => 0
        ]);
    }
}
