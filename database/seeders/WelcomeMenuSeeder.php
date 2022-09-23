<?php

namespace Database\Seeders;

use App\Models\WelcomeMenu;
use Illuminate\Database\Seeder;

class WelcomeMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menus = [
            [
                'title' => 'Browse Startups',
                'url' => '/browse/startups'
            ],
            [
                'title' => 'Seek funding',
                'url' => '/browse/investors'
            ],
            [
                'title' => 'Find mentors',
                'url' => '/browse/mentors'
            ],
            [
                'title' => '
                    <span class="text-danger">Startup KPIs Day</span>
                ',
                'url' => '/startup/kpis'
            ]
        ];

        foreach ($menus as $menu) {
            WelcomeMenu::create($menu);
        }
    }
}
