<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $issue=[
            'Strategy',
            'Business analytics',
            'Technology',
            'AI',
            'Management',
            'Blockchain',
            'Team',
            'Investment',
            'Finance',
            'Legal',
            'IT',
            'Product development',
            'Product Design',
            'Sales',
            'Marketing',
            'Leadership'
        ];
        foreach ($issue as $value) {
            \App\Models\Issue::create([
                "title"=>$value
            ]);
        }
    }
}
