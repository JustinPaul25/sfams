<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Types\RoleType;
use App\Models\BranchAccount;
use App\Models\BranchUtility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            'Smyrna Christian Academy of Sto. Tomas, Inc.',
            'Jeremiah Christian Learning Center',
            'Philippine Baptist Christian College of Mindanao, Inc.',
            'Philippine Baptist Christian College of Mindanao, Inc.',
            'Proverbs School of Wisdom Academy',
            'Philippine Baptist Christian College of Mindanao, Inc.',
            'Grace Pre-School Learning Center',
        ];

        $address = [
            'Purok 6B, Feeder Road #2, Tibal-og, Sto. Tomas, Davao del Norte',
            'Purok 10, Feeder Road #3, Sto. Tomas, Davao del Norte',
            'Marscon Branch, Purok 20, Marscon, Sto. Tomas, Davao del Norte',
            'Puerto Azul Branch, Block 15, Lot 10, Puerto Azul Subdivision, Sto. Tomas, Davao del Norte',
            'Purok 2B, Feeder Road #1, Tibal-og, Sto. Tomas, Davao del Norte',
            'Bobongon Branch, Purok 1, Bobongon, Sto. Tomas, Davao del Norte',
            'Purok 1, New Katipunan, Sto. Tomas, Davao del Norte',
        ];

        $email = [
            'branch1@mail.com',
            'branch2@mail.com',
            'branch3@mail.com',
            'branch4@mail.com',
            'branch5@mail.com',
            'branch6@mail.com',
            'branch7@mail.com',
        ];

        $utility = BranchUtility::find(1);

        foreach($branches as $key=>$branch){
            $user = User::create([
                'name' => $branch,
                'email' => $email[$key],
                'password' => Hash::make('branchpassword'),
            ]);

            $branch = Branch::create([
                'name' => $branch,
                'address' => $address[$key],
                'user_id' => $user->id,
                'student_count' => 0,
            ]);

            BranchAccount::create([
                'branch_id' => $branch->id,
                'back_account' => 0,
                'renewal' => $utility->renewal,
                'royalty' => 0,
                'per_student_total' => 0,
            ]);

            $user->assignRole(RoleType::BRANCH);
        }
    }
}
