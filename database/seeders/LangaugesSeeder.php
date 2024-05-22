<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LangaugesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        Language::create([
            "name"=>"English",
            "slug"=>"en"
        ]);
        Language::create([
            "name"=>"Georgian",
            "slug"=>"ge"
        ]);
    }

}
