<?php

namespace Database\Seeders;

use App\Models\Faq_questions;
use Illuminate\Database\Seeder;

class FaqQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            [
                'category_id' => 1,
                'questions' => [
                    'How long does it take to register a Company?',
                    'How much does it cost to register a legal entity?',
                    'What form of business is the most popular?',
                    'Where can i find applications forms and other documents?',
                    'How long does it take to receive a license a necessary permits?',
                    'What documents are required for registration with foreign capital?',
                    'What can the company do after the registration is complete?',
                    'What documents are required to register a company?',
                    'Where is the registration authority located?'
                ]
            ],
            [
                'category_id' => 2,
                'questions' => [
                    'What is the taxation system?',
                    'What is the VAT?',
                    'What is the land tax rate?',
                    'How can I use tax under the simplified taxation system?',
                    'What is the road tax rate?',
                    'How is the tax calculated?',
                    'Is it possible to register online?'
                ]
            ],
            [
                'category_id' => 3,
                'questions' => [
                    'What documents are required to open a company account in a bank?',
                    'What banks are there?'
                ]
            ],
            [
                'category_id' => 4,
                'questions' => [
                    'At what stage is the sphere of e-commerce?',
                    'How many online stores operate?',
                    'What has played a significant role in the development of e-commerce?',
                    'Which E-commerce sites are the most used?'
                ]
            ],
            [
                'category_id' => 5,
                'questions' => []
            ],
            [
                'category_id' => 6,
                'questions' => [
                    'What recruiting agencies are?'
                ]
            ],
            [
                'category_id' => 7,
                'questions' => [
                    'How can startups in Ukraine attract funding?'
                ]
            ],
            [
                'category_id' => 8,
                'questions' => [
                    'How can startups in Ukraine attract funding?',
                    'What platforms for accelerating startups are there?'
                ]
            ],
            [
                'category_id' => 9,
                'questions' => [
                    'What Co-working spaces are?'
                ]
            ],
            [
                'category_id' => 10,
                'questions' => []
            ],
            [
                'category_id' => 11,
                'questions' => [
                    'When did a pilot project on the use of blockchain technology start in Ukraine?'
                ]
            ],
        ];
        foreach ($categories as $category) {
            foreach ($category['questions'] as $question) {
                Faq_questions::create([
                    'category_id' => $category['category_id'],
                    'question' => $question
                ]);
            }
        }

    }
}
