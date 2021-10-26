<?php

namespace Database\Seeders;

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
        \App\Models\Language::create([
            "name"=>"English",
            "slug"=>"en"
        ]);
        \App\Models\Language::create([
            "name"=>"Georgian",
            "slug"=>"ge"
        ]);
    }
    
}
