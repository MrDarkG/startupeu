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
		static public function updateMyProfileInfo($request)
		{
			// code...
		}
		static public function createProfile($request)
		{
			// code...
		}
	}	
?>