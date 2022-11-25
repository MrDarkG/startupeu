<?php

namespace App\Services;

use App\Models\Investor;
use App\Services\UserService;
use Illuminate\Http\Request;
use Storage;
use Auth;
class InvestorServices extends MainServices
{
	static public function getMyProfileInfo($value='')
	{
		return Investor::where("user_id",Auth::user()->id)->first();
	}
	static public function checkIfInvestorHaveProfileCompleted()
	{
		return Investor::where("user_id",Auth::user()->id)->count();
	}
	static public function getMyImageName($value='')
	{
		return Investor::where("user_id",Auth::user()->id)->first()->logo;
	}

	static public function updateMyProfileInfo($request){
		if ($request->input("image")) {
			$filaname=parent::generateRandomString().".jpg";
			$base64_image = $request->input("image");
	        $data = substr($base64_image, strpos($base64_image, ',') + 1);
	        $data = base64_decode($data);
			Storage::disk('investors_avatar')->put($filaname,$data);
			$filaname="/investor/".$filename;
		}
		else{
			$filaname=self::getMyImageName();
		}
        $user_id = ($request->input('user_id'))?$request->input('user_id'):Auth::user()->id;
        Investor::where("user_id",$user_id)->update([
			"name"=>$request->input("name.full"),
	        "company_name"=>$request->input("name.company"),
	        "investments"=>$request->input("about.investments"),
	        "about"=>$request->input("about.investor"),
	        "website"=>$request->input("website"),
	        "email"=>$request->input("email"),
	        "range_id"=>$request->input("investment_range"),
	        "market_id"=>$request->input("which.market"),
	        "interest_id"=>$request->input("which.stage"),
	        "country_id"=>$request->input("country"),
	        "type_id"=>$request->input("investor_type"),
            "user_id" => $user_id,
	        "logo"=>'/investor/'.$filaname
		]);

        return UserService::setUserType("investor");
	}

	static public function createProfile($request)
	{
		$filename ='/investor/'.parent::generateRandomString().".jpg";
        $base64_image = $request->input("image");
        parent::saveImage($base64_image, $filename,"investors_avatar");
        $user_id = ($request->input('user_id'))?$request->input('user_id'):Auth::user()->id;
		Investor::create([
			"name"=>$request->input("name.full"),
			"user_id"=>$user_id,
	        "company_name"=>$request->input("name.company"),
	        "investments"=>$request->input("about.investments"),
	        "about"=>$request->input("about.investor"),
	        "website"=>$request->input("website"),
	        "email"=>$request->input("email"),
	        "range_id"=>$request->input("investment_range.id"),
	        "market_id"=>$request->input("which.market.id"),
	        "interest_id"=>$request->input("which.stage.id"),
	        "country_id"=>$request->input("country.id"),
	        "type_id"=>$request->input("investor_type.id"),
	        "logo"=>$filename
		]);

        return UserService::setUserType("investor",$user_id);
//
//		return [
//            "status"=>"1",
//            "description"=>"Information stored Successfully"
//        ];
	}
}
