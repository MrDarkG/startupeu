<?php
namespace App\Services;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;

class UserService
{
    static public function setUserType($type)
    {
        User::where("id",Auth::user()->id)->update([
            "user_type" => $type
        ]);

        return '/'.$type.'/dashboard/index';
    }
}
