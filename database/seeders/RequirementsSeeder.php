<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requirement::create([
            'department' => 'Kinder',
            'coc' => true,
            'birth_cert' => true,
        ]);

        Requirement::create([
            'department' => 'Elementary',
            'coc' => true,
            'birth_cert' => true,
            'ECCD_checklist' => true,
            'card' => true,
        ]);

        Requirement::create([
            'department' => 'Junior High',
            'picture' => true,
            'coc' => true,
            'birth_cert' => true,
            'good_moral' => true,
            'card' => true,
            'form_137' => true,
        ]);

        Requirement::create([
            'department' => 'Elementary',
            'transferee' => true,
            'birth_cert' => true,
            'good_moral' => true,
            'card' => true,
            'form_137' => true,
        ]);

        Requirement::create([
            'department' => 'Junior High',
            'transferee' => true,
            'birth_cert' => true,
            'good_moral' => true,
            'card' => true,
            'form_137' => true,
        ]);
    }
}
