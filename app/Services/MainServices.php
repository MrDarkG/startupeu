<?php
namespace App\Services;
use Illuminate\Support\Facades\Storage;

class MainServices
{
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
