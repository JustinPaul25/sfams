<?php

namespace Database\Seeders;

use App\Models\PaymentUtility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentUtilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentUtility::create([
            'type' => 'Elementary',
            'entrance' => 0.00,
            'misc' => 0.00,
            'tuition' => 0.00,
            'books' => 0.00,
            'handbook' => 0.00,
            'id_fee' => 0.00,
            'closing' => 0.00,
            'graduation' => 0.00
        ]);

        PaymentUtility::create([
            'type' => 'Junior High',
            'entrance' => 0.00,
            'misc' => 0.00,
            'tuition' => 0.00,
            'books' => 0.00,
            'handbook' => 0.00,
            'id_fee' => 0.00,
            'closing' => 0.00,
            'graduation' => 0.00
        ]);

        PaymentUtility::create([
            'type' => 'Senior High',
            'entrance' => 0.00,
            'misc' => 0.00,
            'tuition' => 0.00,
            'books' => 0.00,
            'handbook' => 0.00,
            'id_fee' => 0.00,
            'closing' => 0.00,
            'graduation' => 0.00
        ]);
    }
}
