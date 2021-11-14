<?php
namespace App\Services;

use App\Models\Startup;
use Auth; 
use Illuminate\Http\Request;
use Storage;

	class StartupServices extends MainServices
	{
		
		static public function getMyProfileInfo($value='')
		{
			return Startup::where("user_id",Auth::user()->id)->first();
		}
		static public function checkIfStartupHaveProfileCompleted($value='')
		{
			return Startup::where("user_id",Auth::user()->id)->count();
		}
		static public function getMyImageName()
		{
			return Startup::where("user_id",Auth::user()->id)->first()->logo;
		}
		static public function updateMyProfileInfo($request)
		{
			if ($request->input("image")) {
				$filaname=parent::generateRandomString().".jpg";
				$base64_image = $request->input("image");
		        $data = substr($base64_image, strpos($base64_image, ',') + 1);
		        $data = base64_decode($data);
				Storage::disk('startups_logos')->put($filaname,$data);
				$filename="/startup/".$filaname;
			}
			else{
				$filaname=self::getMyImageName();
			}
			Startup::where("user_id",Auth::user()->id)->update([
				"name"=>$request->input("startup.name"),
		        "founded"=>$request->input("founded.year"),
		        "full_name"=>$request->input("full_name"),
		        "phone_index"=>$request->input("phone.index"),
		        "number"=>$request->input("phone.number"),
		        "ceo_email"=>$request->input("ceo_email"),
		        "startup_email"=>$request->input("startup.email"),
		        "website"=>$request->input("website"),
		        "what_your_company_does"=>$request->input("about.company"),
		        "description"=>$request->input("about.product"),
		        "inovation"=>$request->input("about.innovation"),
		        "stage_id"=>$request->input("current_stage"),
		        "bussiness_model"=>$request->input("bussiness_model"),
		        "target_audience"=>$request->input("target_audience"),
		        "industries_id"=>$request->input("industries"),
		        "country_id"=>$request->input("country"),
		        "looking_for_id"=>$request->input("what_are_you_looking"),
		        "user_id"=>$Auth::user()->id,
		        "logo"=>$filaname
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
			Storage::disk('startups_logos')->put($filaname,$data);
			Startup::create([
				"name"=>$request->input("startup.name"),
		        "founded"=>$request->input("founded.year"),
		        "full_name"=>$request->input("full_name"),
		        "phone_index"=>$request->input("phone.index"),
		        "number"=>$request->input("phone.number"),
		        "ceo_email"=>$request->input("ceo_email"),
		        "startup_email"=>$request->input("startup.email"),
		        "website"=>$request->input("website"),
		        "what_your_company_does"=>$request->input("about.company"),
		        "description"=>$request->input("about.product"),
		        "inovation"=>$request->input("about.innovation"),
		        "stage_id"=>$request->input("current_stage"),
		        "bussiness_model"=>$request->input("bussiness_model"),
		        "target_audience"=>$request->input("target_audience"),
		        "industries_id"=>$request->input("industries"),
		        "country_id"=>$request->input("country"),
		        "looking_for_id"=>$request->input("what_are_you_looking"),
		        "user_id"=>$Auth::user()->id,
		        "logo"=>"/startup/".$filaname
			]);
			return [
	            "status"=>"1",
	            "description"=>"Information stored Successfully"
	        ];
		}
	}	
?>