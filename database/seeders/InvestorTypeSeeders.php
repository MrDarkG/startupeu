<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investor_type;

class InvestorTypeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $types=[
           "Venture Funds",
           "Angels", 
           "Acclerators" 
        ];
        foreach ($types as  $value) {
            Investor_type::create([
                "title"=>$value
            ]);
        }
    }
}
