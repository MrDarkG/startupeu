<?php

namespace App\Http\Controllers;

use App\Services\VisitorsService;
use \Illuminate\Support\Facades\Request as Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
    {
        VisitorsService::updateOrCreate($request::ip(), $request::server('HTTP_REFERER'));
    }
}
