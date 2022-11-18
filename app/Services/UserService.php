<?php
namespace App\Services;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;

class UserService
{
    static public function setUserType($type, $user_id)
    {
        User::where("id",$user_id)->update([
            "user_type" => $type
        ]);
        if($user_id == Auth::user()->id){
            return '/'.$type.'/dashboard/index';
        }else{
            return '/admin/add/user';
        }
    }
}
