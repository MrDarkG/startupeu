<?php

namespace App\Services;

use App\Models\Investor;
use App\Models\Investor_industries;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\Numeric_;

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
            $filename='/investor/'.parent::generateRandomString().".jpg";
			$base64_image = $request->input("image");
            parent::saveImage($base64_image, $filename, "investors_avatar");
            $filename="/investor/".$filename;
		}else{
            $filename=self::getMyImageName();
		}
        $user_id = $request->input('user_id')??Auth::user()->id;
        Investor::where('user_id', $user_id)->update([
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
        $investor_id = Investor::where("user_id",$user_id)->firstOrFail()->id;
        Investor_industries::where("investor_id",$investor_id)->delete();
        self::saveInvestorIndustries($request->input('industries'),$investor_id, $user_id);

        return UserService::setUserType("investor",$user_id);
	}
    static public function saveInvestorIndustries(array $industries,int $investor_id,int $user_id){
        foreach($industries as $industry){
            Investor_industries::create([
                "investor_id" => $investor_id,
                "industry_id" => $industry['id'],
                "user_id" => $user_id
            ]);
        }
    }
	static public function createProfile($request)
	{
		$filename ='/investor/'.parent::generateRandomString().".jpg";
        $base64_image = $request->input("image");
        parent::saveImage($base64_image, $filename,"investors_avatar");
        $user_id = $request->input('user_id')??Auth::user()->id;
		$investor = Investor::create([
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
        self::saveInvestorIndustries($request->input('industries'),$investor->id, $user_id);

        return UserService::setUserType("investor",$user_id);
	}
}
