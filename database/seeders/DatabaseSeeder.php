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
    public function run
    {
        $this->call([
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
            LangaugesSeeder::class,
            PhoneIndexSeeder::class,
            CountrySeeder::class,
            FaqCuntrySeeder::class,
            FieldSeeder::class,
            IssueSeeder::class,
            InvestorTypeSeeders::class,
            IndustrySeeder::class,
            RangeSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
        
       
    }

}
