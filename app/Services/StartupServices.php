<?php
namespace App\Services;

use App\Models\Startup;
use App\Models\Startup_industries;
use App\Models\Startup_looking_for;
use App\Models\TargetAudience;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

	class StartupServices extends MainServices
	{

		static public function getMyProfileInfo()
		{
			return Startup::where("user_id",Auth::user()->id)->first();
		}
		static public function updateMyProfileInfo($request)
		{
            $user_id = $request->input('user_id')?$request->input('user_id'):Auth::user()->id;
            if ($request->input("image")) {
                $fileName=parent::generateRandomString().".jpg";
				$base64_image = $request->input("image");
                parent::saveImage($base64_image, $fileName, "startups_logos");
                $fileName="/startup/".$fileName;
			}
			else{
                $fileName=parent::getMyImageName($user_id, Startup::class);
			}
            $startup = Startup::where("user_id",$user_id);
            self::saveSideData(
                $request->input("industries"),
                $request->input("what_are_you_looking"),
                $startup->first()->id,
                $user_id
            );
			$startup->update([
                "name"=>$request->input("startup.name"),
                "founded"=>$request->input("founded.year"),
                "number_of_founders"=>7,
                "full_name"=>$request->input("full_name"),
                "phone_index"=>$request->input("phone.index.id"),
                "number"=>$request->input("founded.number"),
                "ceo_email"=>$request->input("startup.number"),
                "startup_email"=>$request->input("startup.email"),
                "website"=>$request->input("website"),
                "what_your_company_does"=>$request->input("about.company"),
                "description"=>$request->input("about.product"),
                "inovation"=>$request->input("about.innovation"),
                "stage_id"=>$request->input("current_stage.id"),
                "bussiness_model"=>$request->input("bussiness_model.id"),
                "target_audience"=>$request->input("target_audience.id"),
                "range_id"=>$request->input("how_much.id"),
                "country_id"=>$request->input("country.id"),
                "user_id"=>$user_id,
                "logo"=>$fileName
			]);
            return UserService::setUserType("startup", $user_id);
		}
		static public function createProfile($request)
		{
            $request->validate([
                'image' => 'required',
            ]);
			$fileName=parent::generateRandomString().".jpg";
			$base64_image = $request->input("image");
            parent::saveImage($base64_image, $fileName, "startups_logos");
            $user_id = $request->input('user_id')?$request->input('user_id'):Auth::user()->id;
			$startup=Startup::create([
				"name"=>$request->input("startup.name"),
		        "founded"=>$request->input("founded.year"),
                "number_of_founders"=>7,
		        "full_name"=>$request->input("full_name"),
		        "phone_index"=>$request->input("phone.index.id"),
		        "number"=>$request->input("founded.number"),
		        "ceo_email"=>$request->input("startup.number"),
		        "startup_email"=>$request->input("startup.email"),
		        "website"=>$request->input("website"),
		        "what_your_company_does"=>$request->input("about.company"),
		        "description"=>$request->input("about.product"),
		        "inovation"=>$request->input("about.innovation"),
		        "stage_id"=>$request->input("current_stage.id"),
		        "bussiness_model"=>$request->input("bussiness_model.id"),
		        "range_id"=>$request->input("how_much"),
		        "target_audience"=>$request->input("target_audience.id"),
		        "country_id"=>$request->input("country.id"),
		        "user_id"=>$user_id,
		        "logo"=>"/startup/".$fileName
			]);
            self::saveSideData(
                $request->input("industries"),
                $request->input("what_are_you_looking"),
                $startup->id,
                $user_id
            );
            return UserService::setUserType("startup", $user_id);
		}
        static public function saveSideData($industries = [], $looking_for = [], $startup_id ,$user_id){
            if($industries){
                Startup_industries::where("startup_id",$startup_id)->delete();
                foreach ($industries as $industry) {
                    Startup_industries::create([
                        "industry_id"=>$industry['id'],
                        "startup_id"=>$startup_id,
                        "user_id"=>$user_id
                    ]);
                }
            }
            if($looking_for){
                Startup_looking_for::where("startup_id",$startup_id)->delete();
                foreach ($looking_for as $value) {
                    Startup_looking_for::create([
                        "looking_for_id" => $value['id'],
                        "startup_id"=>$startup_id,
                        "user_id"=>$user_id
                    ]);
                }
            }
            return "done";
        }
	}
?>
