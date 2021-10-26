<?php 

namespace App\Services;

use App\Models\Mentor;
use Auth;
use Illuminate\Http\Request;
use Storage;
class MentorServices extends MainServices
{
	
	static public function getMyProfileInfo($value='')
	{
		return Mentor::where("user_id",Auth::user()->id)->first();
	}

	public function checkIfMentorHaveProfileCompleted()
	{
		return Mentor::where("user_id",Auth::user()->id)->count();
	}

	static public function updateMyProfileInfo($request)
	{
		$filaname=parent::generateRandomString().".jpg";

		$base64_image = $request->input("avatar");
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
        // Storage::disk('avatars')->put($image_name, $data);
		Storage::disk('mentors_avatar')->put($filaname,$data);

		Mentor::where("user_id",Auth::user()->id)->update([
			'name'=>$request->input("name"),
        	'linnkedin'=>$request->input("linnkedin"),
        	'question1'=>$request->input("question1"),
        	'question2'=>$request->input("question2"),
        	'country_id'=>$request->input("country_id"),
        	'fields_id'=>$request->input("fields_id"),
        	'issues_id'=>$request->input("issues_id"),
        	'user_id'=>$request->input("user_id"),
        	'logo'=>'/mentors/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information updated Successfully"
        ];

	}

	public function createProfile($request)
	{
		$filaname=parent::generateRandomString().".jpg";
		$base64_image = $request->input("avatar");
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
		Storage::disk('mentors_avatar')->put($filaname,$data);
		Mentor::create([
			'name'=>$request->input("name"),
        	'linnkedin'=>$request->input("linnkedin"),
        	'question1'=>$request->input("question1"),
        	'question2'=>$request->input("question2"),
        	'country_id'=>$request->input("country_id"),
        	'fields_id'=>$request->input("fields_id"),
        	'issues_id'=>$request->input("issues_id"),
        	'user_id'=>$request->input("user_id"),
        	'logo'=>'/mentors/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information stored Successfully"
        ];
	}
}