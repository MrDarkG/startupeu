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
    static public function create($ip, $referer)
    {
        if (!Visitors::where('ip', $ip)->first()) {
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
        return Visitors::orderBy('created_at','desc')->get();
    }
    static public function monthlyVisitors()
    {
        return VisitorStatistics::orderBy('created_at','desc')->get();
    }
    static public function saveVisitorsCountAfterDelete(): void
    {
        VisitorStatistics::create([
            'counted' => Visitors::get()->count()
        ]);
    }
}
