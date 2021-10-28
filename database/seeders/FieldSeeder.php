<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static public function run()
    {
        $fields=[
            'AR/VR',
            'Legal',
            'Enterprise Software',
            'Media',
            'Marketing',
            'Security',
            'Real Estate',
            'Media',
            'Robotics',
            'Telecom',
            'Home Living',
            'Jobs Recruitment',
            'Educational Technology',
            'Blockchain',
            'AI',
            'Customer goods and retail',
            'Business and Industrial',
            'Tourism+travel',
            'Social Enterprise',
            'Agriculture (foodTech, Cultivation)',
            'Hospitality, sports and entertainment (Dating,Gaming,Sports,music,fashion)',
            'Life sciences (bioTech, healthTech, DragTech, MedTech, Healthcare)',
            'Banking and Financial services (Fintech, Insuretech)',
            'Green/clean Technology'
        ];
        foreach ($fields as $value) {
            \App\Models\Field::create([
                "title"=>$value
            ]);
        }
    }
}
