<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\PaymentUtility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentUtilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = Branch::get();

        foreach($branches as $branch) {
            PaymentUtility::create([
                'branch_id' => $branch->id,
                'type' => 'Elementary',
                'entrance' => 1000.00,
                'misc' => 200.00,
                'tuition' => 9000.00,
                'books' => 4000.00,
                'handbook' => 100.00,
                'id_fee' => 100.00,
                'closing' => 300.00,
                'graduation' => 700.00
            ]);

            PaymentUtility::create([
                'branch_id' => $branch->id,
                'type' => 'Junior High',
                'entrance' => 2000.00,
                'misc' => 300.00,
                'tuition' => 10000.00,
                'books' => 5000.00,
                'handbook' => 200.00,
                'id_fee' => 200.00,
                'closing' => 400.00,
                'graduation' => 800.00
            ]);

            PaymentUtility::create([
                'branch_id' => $branch->id,
                'type' => 'Senior High',
                'entrance' => 3000.00,
                'misc' => 400.00,
                'tuition' => 11000.00,
                'books' => 6000.00,
                'handbook' => 300.00,
                'id_fee' => 300.00,
                'closing' => 500.00,
                'graduation' => 900.00
            ]);
        }
    }
}
