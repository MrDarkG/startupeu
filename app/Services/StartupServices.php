<?php
namespace App\Services;

use App\Models\Startup;
use App\Models\Startup_industries;
use App\Models\Startup_looking_for;
use App\Services\UserService;

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
                "phone_index"=>$request->input("phone.index.id"),
                "number"=>$request->input("startup.number"),
                "ceo_email"=>$request->input("startup.number"),
                "startup_email"=>$request->input("startup.email"),
                "website"=>$request->input("website"),
                "what_your_company_does"=>$request->input("about.company"),
                "description"=>$request->input("about.product"),
                "inovation"=>$request->input("about.innovation"),
                "stage_id"=>$request->input("current_stage.id"),
                "bussiness_model"=>$request->input("bussiness_model.id"),
                "target_audience"=>$request->input("target_audience.id"),
                "country_id"=>$request->input("country.id"),
                "user_id"=>Auth::user()->id,
                "logo"=>"/startup/".$filaname
			]);

            return UserService::setUserType("startup");

//			return [
//	            "status"=>"1",
//	            "description"=>"Information updated Successfully"
//	        ];
		}
		static public function createProfile($request)
		{
            $request->validate([
                'image' => 'required',
                'startup.name' => 'required|unique',
                'founded.year' => 'required',
                'founded.number' => 'required',
                'full_name' => 'required',
                'phone.index' => 'required',
                'ceo.number' => 'required|numeric',
                'startup.email' => 'required',
                'startup.number' => 'required',
                'website' => 'required',
                'about.company' => 'required',
                'about.product' => 'required',
                'about.innovation' => 'required',
                'current_stage' => 'required',
                'bussiness_model' => 'required',
                'target_audience' => 'required',
                'industries' => 'required',
                'country' => 'required',
                'what_are_you_looking' => 'required',
            ]);
			$filaname=parent::generateRandomString().".jpg";
			$base64_image = $request->input("image");
	        $data = substr($base64_image, strpos($base64_image, ',') + 1);
	        $data = base64_decode($data);
			Storage::disk('startups_logos')->put($filaname,$data);
			$startup=Startup::create([
				"name"=>$request->input("startup.name"),
		        "founded"=>$request->input("founded.year"),
		        "full_name"=>$request->input("full_name"),
		        "phone_index"=>$request->input("phone.index.id"),
		        "number"=>$request->input("startup.number"),
		        "ceo_email"=>$request->input("startup.mobile"),
		        "startup_email"=>$request->input("startup.email"),
		        "website"=>$request->input("website"),
		        "what_your_company_does"=>$request->input("about.company"),
		        "description"=>$request->input("about.product"),
		        "inovation"=>$request->input("about.innovation"),
		        "stage_id"=>$request->input("current_stage.id"),
		        "bussiness_model"=>$request->input("bussiness_model.id"),
		        "target_audience"=>$request->input("target_audience.id"),
		        "country_id"=>$request->input("country.id"),
		        "user_id"=>Auth::user()->id,
		        "logo"=>"/startup/".$filaname
			]);
            $industries = $request->input("industries");
			foreach ($industries as $key => $value) {
				Startup_industries::create([
					"industry_id"=>$value->id,
        			"startup_id"=>$startup->id,
        			"user_id"=>Auth::user()->id
				]);
			}
            $looking_for = $request->input("looking_for");
			foreach ($looking_for as $key => $value) {
				Startup_looking_for::create([
					"industry_id"=>$value->id,
					"startup_id"=>$startup->id,
        			"user_id"=>Auth::user()->id
				]);
			}

            return UserService::setUserType("startup");

//			return [
//	            "status"=>"1",
//	            "description"=>"Information updated Successfully"
//	        ];
		}
	}
?>
