<?php

namespace App\Services;

use App\Models\Mentor;
use App\Models\Mentor_issues;
use App\Services\UserService;
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
        $user_id = Auth::user()->id;

        if ($request->input("avatar")) {
			$filaname=parent::generateRandomString().".jpg";
			$base64_image = $request->input("avatar");
	        $data = substr($base64_image, strpos($base64_image, ',') + 1);
	        $data = base64_decode($data);
			Storage::disk('mentors_avatar')->put($filaname,$data);
			$filaname="/mentors/".$filename;
		}
		else{
			$filaname=self::getMyImageName();
		}
		Mentor::where("user_id",Auth::user()->id)->update([
            'name'=>$request->input("name"),
            'linnkedin'=>$request->input("linkedin"),
            'question1'=>$request->input("experience"),
            'question2'=>$request->input("experience"),
            'country_id'=>$request->input("country.data.id"),
            'fields_id'=>$request->input("which.field.id"),
            'issues_id'=>0,
            'logo'=>'/mentors/'.$filaname
		]);
        Mentor_issues::where("mentor_id",Auth::user()->id)->delete();

        foreach($request->input("which.issue") as $issue){
            Mentor_issues::create([
                "mentor_id"=>Auth::user()->id,
                "issue_id"=>$issue['id']
            ]);
        }

        return UserService::setUserType("mentor",$user_id);

	}

	static public function createProfile($request)
	{
		$filaname=parent::generateRandomString().".jpg";
		$base64_image = $request->input("avatar");
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
		Storage::disk('mentors_avatar')->put($filaname,$data);
        $user_id = $request->input('user_id')?$request->input('user_id'):Auth::user()->id;
		Mentor::create([
			'name'=>$request->input("name"),
        	'linnkedin'=>$request->input("linkedin"),
        	'question1'=>$request->input("experience"),
        	'question2'=>$request->input("experience"),
        	'country_id'=>$request->input("country.data.id"),
        	'fields_id'=>$request->input("which.field.id"),
        	'issues_id'=>0,
        	'user_id'=>$user_id,
        	'logo'=>'/mentors/'.$filaname
		]);

        foreach($request->input("which.issue") as $issue){
            Mentor_issues::create([
                "mentor_id"=>$user_id,
                "issue_id"=>$issue['id']
            ]);
        }

        return UserService::setUserType("mentor", $user_id);

//		return [
//            "status"=>"1",
//            "description"=>"Information stored Successfully"
//        ];
	}
}
