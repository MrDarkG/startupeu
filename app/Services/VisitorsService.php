<?php
namespace App\Services;

use App\Models\Visitors;
use Illuminate\Http\Request;

class VisitorsService
{
    static public function deleteVisitors() : void
    {
        Visitors::truncate();
    }
    static public function countVisitors($ip, $referer) : void
    {
        Visitors::firstOrCreate([
            'ip' => $ip,
        ],[
            'referer' => $referer
        ]);
    }
}
