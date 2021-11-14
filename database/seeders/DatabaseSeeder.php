<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        LangaugesSeeder::run();
        PhoneIndexSeeder::run();
        CountrySeeder::run();
        FaqCuntrySeeder::run();
        FieldSeeder::run();
        IssueSeeder::run();
        InvestorTypeSeeders::run();
        IndustrySeeder::run();
    }

}
