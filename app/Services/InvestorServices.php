<?php

namespace App\Services;

use App\Models\Investor;
use App\Models\Investor_industries;
use App\Models\Startup_apply_investor;
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
	static public function updateMyProfileInfo($request){
        $user_id = $request->input('user_id')??Auth::user()->id;
		if ($request->input("image")) {
            $fileName=parent::generateRandomString().".jpg";
			$base64_image = $request->input("image");
            parent::saveImage($base64_image, $fileName, "investors_avatar");
            $fileName="/investor/".$fileName;
		}else{
            $fileName=parent::getMyImageName($user_id, Investor::class);
		}
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
            "logo"=>$fileName
        ]);
        $investor_id = Investor::where("user_id",$user_id)->firstOrFail()->id;
        Investor_industries::where("investor_id",$investor_id)->delete();
        self::saveInvestorIndustries($request->input('industries'),$investor_id, $user_id);

        return UserService::setUserType("investor",$user_id);
	}
	static public function createProfile($request)
	{
        $request->validate([
            'image' => 'required',
        ]);
		$fileName =parent::generateRandomString().".jpg";
        $base64_image = $request->input("image");
        parent::saveImage($base64_image, $fileName,"investors_avatar");
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
	        "logo"=>'/investor/'.$fileName
		]);
        self::saveInvestorIndustries($request->input('industries'),$investor->id, $user_id);
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
    static public function setStatusForStartup($request)
    {
        $request->validate([
            'startup_id' => 'required|numeric',
            'investor_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ]);
        $apply_exists = Startup_apply_investor::where('startup_id',$request->startup_id)
            ->where('investor_id',$request->investor_id)->with('status');
        if($apply_exists->count() > 0){
            $apply_exists->update([
                'status_id' => $request->status_id,
            ]);
        }else{
            $apply_exists->create([
                'status_id' => $request->status_id,
                'startup_id' => $request->startup_id,
                'investor_id' => $request->investor_id,
            ]);
        }
        return $apply_exists->first();
    }
}
