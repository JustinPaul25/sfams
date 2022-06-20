<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Ulas Branch, Km 8, Davao Bukidnon Rd., Upper Ulas, Talomo, Davao City'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Luna Branch, Purok 10, Luna, Kapalong, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Smyrna Christian Academy of Sto. Tomas, Inc.',
            'address' => 'Purok 6B, Feeder Road #2, Tibal-og, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Kids Learning Cove',
            'address' => 'Purok 17, Tan Compound, Poblacion Nabunturan, Davao de Oro'
        ]);

        Branch::create([
            'name' => 'Jeremiah Christian Learning Center',
            'address' => 'Purok 10, Feeder Road #3, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Philippine Baptist Christian College of Mindanao, Inc.'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Marscon Branch, Purok 20, Marscon, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Puerto Azul Branch, Block 15, Lot 10, Puerto Azul Subdivision, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Ilang Branch, Block 9, Lot 3, Eagles View Village, Ilang, Davao City'
        ]);

        Branch::create([
            'name' => 'Proverbs School of Wisdom Academy',
            'address' => 'Purok 2B, Feeder Road #1, Tibal-og, Sto. Tomas, Davao del Norte'
        ]);
        
        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Toril Branch, 2360 Durian St., Daliao Toril, Davao City'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Tubod Branch, Purok 3, Brgy. Tubod, Carmen, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Bobongon Branch, Purok 1, Bobongon, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Sawata Branch, Sawata, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Grace Pre-School Learning Center',
            'address' => 'Purok 1, New Katipunan, Sto. Tomas, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Carmen Branch, Purok 6, Mangalcal, Carmen, Davao del Norte'
        ]);

        Branch::create([
            'name' => 'Philippine Baptist Christian College of Mindanao, Inc.',
            'address' => 'Feeder Road #3 Branch, Waling-waling St., Feeder Road #3, Tibal-og, Sto. Tomas, Davao del Norte'
        ]);
    }
}
