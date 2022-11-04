<?php

namespace Database\Seeders;

use App\Models\MainEventButtons;
use Illuminate\Database\Seeder;

class MainButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buttons = [
            [
                'title' => 'Registration for Startups',
                'url' => 'https://forms.gle/9es8dVipjfax2Uzn9',
                'color' => '#6200ee',
            ],
            [
                'title' => 'Investors/Participants',
                'url' => 'https://forms.gle/mLuZ9uWyV7X21Kmy6',
                'color' => '#03dac5',
            ],
            [
                'title' => 'Program',
                'url' => 'https://startupcentraleurasia.com/files/Startup_KPIs_Day.pdf',
                'color' => '#ff2d55',
            ],
        ];

        foreach ($buttons as $button) {
            MainEventButtons::create($button);
        }
    }
}
