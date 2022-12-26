<?php
namespace App\Services;
use App\Models\Startup_team_info;
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
    static public function getResultWithImageValue($class_name, $is_image_base_64, $base64, $fileName, $value, $model_id, $diskname, $column_name){
        if($is_image_base_64){
            self::saveImage(
                $base64,
                $fileName,
                $diskname
            );
            return $class_name->create($value);
        }
        $class_name->where($column_name ,$model_id)->update($value);
        return $class_name->where($column_name ,$model_id)->first();
    }
    static public function getResultWithSecondaryKey($class_name, $array_value, $column_name, $relation_id){
        $is_already_exist = $class_name->where($column_name ,$relation_id)->count();
        if($is_already_exist == 0){
            return $class_name->create($array_value);
        }
        $class_name->where($column_name,$relation_id)->update($array_value);
        return $class_name->where($column_name,$relation_id)->first();
    }
}
