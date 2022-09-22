<?php

namespace Database\Seeders;

use App\Models\Faq_category;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $categories=[
            'Company Registration',
            'Taxation',
            'Banks',
            'E-commerce',
            'Programs and Grants',
            'Recruiting Agencies',
            'Acceleration Platforms',
            'Co-working Space',
            'Attracting investment',
            'Blockchain Technology'
        ];
        foreach ($categories as $value) {
            Faq_category::create([
                "title" => $value
            ]);
        }
    }
}
