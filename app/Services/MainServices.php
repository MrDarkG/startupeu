<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainServices
{
    static public function checkIfProfileCompleted($user_id, $model_name)
    {
        $u_id = $user_id??Auth::user()->id;
        return $model_name::where("user_id",$u_id)->count();
    }
    static public function getMyImageName($user_id, $type)
    {
        if($type){
            return $type::where("user_id",$user_id)->first()->logo;
        }
        return null;
    }
	static public function generateRandomString()
	{
		return uniqid().time().uniqid();
	}
    static public function saveImage($base64_image, $filename, $diskname)
    {
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
        Storage::disk($diskname)->put($filename ,$data);
    }
}
