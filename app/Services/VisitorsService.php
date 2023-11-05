<?php

namespace App\Services;

use App\Models\Visitors;
use App\Models\VisitorStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VisitorsService
{
    static public function deleteVisitors(): void
    {
        self::saveVisitorsCountAfterDelete();
        Visitors::truncate();
    }
    static public function updateOrCreate($ip, $referer)
    {
        if (visitors::where('ip', $ip)->count() == 0) {
            $ch = curl_init();
            $url = "http://ip-api.com/json/$ip";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $result = collect(json_decode($output, true));
            Visitors::create([
                'ip' => $ip,
                'country' => $result['country']??'Empty',
                'referer' => $referer
            ]);
        }
    }
    static public function todayVisitors()
    {
        return Visitors::get();
    }
    static public function monthlyVisitors()
    {
        return VisitorStatistics::get();
    }
    static public function saveVisitorsCountAfterDelete(): void
    {
        VisitorStatistics::create([
            'counted' => Visitors::get()->count()
        ]);
    }
}
