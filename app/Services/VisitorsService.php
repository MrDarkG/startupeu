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
            Visitors::firstOrCreate([
                'ip' => $ip,
                'referer' => $referer
            ],[
                'country' => 'unknown'
            ]);
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
