<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq_country;
class FaqCuntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $countries=[
            'Armenia',
            'Azerbaijan',
            'Georgia',
            'Kazakhstan',
            'Kyrgyzstan',
            'Tajikistan',
            'Uzbekistan'
        ];
        foreach ($countries as $value) {
            Faq_country::create([
                "title"=>$value
            ]);  
        }
    }
}
