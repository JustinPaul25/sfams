<?php

namespace Database\Seeders;

use App\Models\BranchUtility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchUtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BranchUtility::create([
            'royalty' => 0,
            'renewal' => 0,
            'per_student' => 0,
        ]);
    }
}
