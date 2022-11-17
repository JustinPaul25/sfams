<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'section' => 'A'
        ]);

        Section::create([
            'section' => 'B'
        ]);

        Section::create([
            'section' => 'C'
        ]);

        Section::create([
            'section' => 'D'
        ]);

        Section::create([
            'section' => 'E'
        ]);
    }
}
