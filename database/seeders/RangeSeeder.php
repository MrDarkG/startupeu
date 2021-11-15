<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Range;
class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {   
        $ranges=[
            "10 000 - 20 000",
            "10 000 - 50 000",
            "50 000 - 100 000",
            "100 000 - 200 000",
            "200 000 - 500 000",
            "500 000 - more"
        ];

        foreach ($ranges as $value) {
            Range::create([
                "title" => $value
            ]);
        }
    }
}
