<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeLevel::Create([
            'level' => 'nursery'
        ]);

        GradeLevel::Create([
            'level' => 'kinder'
        ]);

        for($ctr = 0; $ctr < 12; $ctr++) {
            GradeLevel::Create([
                'level' => 'Grade '.$ctr + 1
            ]);
        }
    }
}
