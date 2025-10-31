<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['bank_name'=> 'gyt', 'account_number'=> 'GTCOGTGC', 'balance'=>100000],
            ['bank_name'=> 'Industrial', 'account_number'=> 'INDLGTGC', 'balance'=>100000],
            ['bank_name'=> 'bac', 'account_number'=> 'AMCNGTGT', 'balance'=>100000],
            ['bank_name'=> 'promerica', 'account_number'=> 'BPRCGTGC', 'balance'=>100000],
            ['bank_name'=> 'banrural', 'account_number'=> 'BRRLGTGC', 'balance'=>100000],
        ];

        foreach ($accounts as $account) {
                    Account::create($account);
        }
    }
}
