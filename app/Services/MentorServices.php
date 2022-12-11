<?php

namespace App\Services;

use App\Models\Mentor;
use App\Models\Mentor_issues;
use App\Services\UserService;
use Auth;
use Illuminate\Http\Request;
class MentorServices extends MainServices
{
	static public function getMyProfileInfo($value='')
	{
		return Mentor::where("user_id",Auth::user()->id)->first();
	}
	static public function checkIfMentorHaveProfileCompleted($user_id="")
	{
		return Mentor::where("user_id",$user_id == ""?Auth::user()->id:$user_id)->count();
	}
	static public function updateMyProfileInfo($request)
	{
        $user_id = $request->user_id?$request->input('user_id'):Auth::user()->id;
        if ($request->input("image")) {
			$fileName=parent::generateRandomString().".jpg";
			parent::saveImage($request->input("image"),$fileName,"mentors_avatar");
		}else{
			$fileName=parent::getMyImageName($user_id, Mentor::class);
		}
		Mentor::where("user_id",$user_id)->update([
            'name'=>$request->input("name"),
            'linnkedin'=>$request->input("linkedin"),
            'question1'=>$request->input("experience"),
            'question2'=>$request->input("experience"),
            'country_id'=>$request->input("country.data.id"),
            'fields_id'=>$request->input("which.field.id"),
            'issues_id'=>0,
            'logo'=>$fileName
		]);
        Mentor_issues::where("mentor_id",$user_id)->delete();
        foreach($request->input("which.issue") as $issue){
            Mentor_issues::create([
                "mentor_id"=>$user_id,
                "issue_id"=>$issue['id']
            ]);
        }
        return UserService::setUserType("mentor",$user_id);
	}

	static public function createProfile($request)
	{
        $request->validate([
            'image' => 'required',
        ]);
		$fileName=parent::generateRandomString().".jpg";
		$base64_image = $request->input("image");
        parent::saveImage($base64_image, $fileName, "mentors_avatar");
        $user_id = ($request->input('user_id'))?$request->input('user_id'):Auth::user()->id;
        Mentor::create([
			'name'=>$request->input("name"),
        	'linnkedin'=>$request->input("linkedin"),
        	'question1'=>$request->input("experience"),
        	'question2'=>$request->input("experience"),
        	'country_id'=>$request->input("country.data.id"),
        	'fields_id'=>$request->input("which.field.id"),
        	'issues_id'=>0,
        	'user_id'=>$user_id,
        	'logo'=>$fileName
		]);
        foreach($request->input("which.issue") as $issue){
            Mentor_issues::create([
                "mentor_id"=>$user_id,
                "issue_id"=>$issue['id']
            ]);
        }
        return UserService::setUserType("mentor", $user_id);
	}
}
