<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;
class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $industries=[
            "Travel",
            "Hosting",
            "Music"
        ];
        foreach ($industries as $value) {
            Industry::create([
                "title"=>$value
            ]);
        }
    }
}
