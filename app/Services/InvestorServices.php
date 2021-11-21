<?php 

namespace App\Services;

use App\Models\Investor;
use Auth;
use Illuminate\Http\Request;
use Storage;
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
		return Investor::::where("user_id",Auth::user()->id)->first()->logo;
	}

	static public function updateMyProfileInfo($request)
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
		Investor::where("user_id",Auth::user()->id)->update([
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
	        "logo"=>'/investor/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information updated Successfully"
        ];
	}

	static public function createProfile($request)
	{
		$filaname=parent::generateRandomString().".jpg";
		$base64_image = $request->input("image");
        $data = substr($base64_image, strpos($base64_image, ',') + 1);
        $data = base64_decode($data);
		Storage::disk('investors_avatar')->put($filaname,$data);
		Mentor::create([
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
	        "logo"=>'/investor/'.$filaname
		]);
		return [
            "status"=>"1",
            "description"=>"Information stored Successfully"
        ];
	}

}