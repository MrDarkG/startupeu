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
	static public function checkIfMentorHaveProfileCompleted()
	{
		return Mentor::where("user_id",Auth::user()->id)->count();
	}
	static public function getMyImageName()
	{
		return Mentor::where("user_id",Auth::user()->id)->first()->logo;
	}
	static public function updateMyProfileInfo($request)
	{
		if ($request->input("avatar")) {
			$filaname=parent::generateRandomString().".jpg";
			$base64_image = $request->input("avatar");
	        $data = substr($base64_image, strpos($base64_image, ',') + 1);
	        $data = base64_decode($data);
			Storage::disk('mentors_avatar')->put($filaname,$data);
		}
		else{
			$filaname=self::getMyImageName();
		}

		Mentor::where("user_id",Auth::user()->id)->update([
			'name'=>$request->input("input.full_name"),
        	'linnkedin'=>$request->input("input.linkedin_address"),
        	'question1'=>$request->input("input.experience_text"),
        	'question2'=>$request->input("input.companies_worked_text"),
        	'country_id'=>$request->input("multiselect.country.is_selected"),
        	'fields_id'=>$request->input("multiselect.country.is_selected"),
        	'issues_id'=>$request->input("multiselect.country.is_selected"),
        	'logo'=>'/mentors/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information updated Successfully"
        ];

	}

	static public function createProfile($request)
	{
		$filaname=parent::generateRandomString().".jpg";
		$base64_image = $request->input("avatar");
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
		Storage::disk('mentors_avatar')->put($filaname,$data);
		Mentor::create([
			'name'=>$request->input("input.full_name"),
        	'linnkedin'=>$request->input("input.linkedin_address"),
        	'question1'=>$request->input("input.experience_text"),
        	'question2'=>$request->input("input.companies_worked_text"),
        	'country_id'=>$request->input("multiselect.country.is_selected"),
        	'fields_id'=>$request->input("multiselect.country.is_selected"),
        	'issues_id'=>$request->input("multiselect.country.is_selected"),
        	'user_id'=>Auth::user()->id,
        	'logo'=>'/mentors/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information stored Successfully"
        ];
	}
}