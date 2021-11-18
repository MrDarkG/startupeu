<?php
namespace App\Services;

use App\Models\Stage;
use App\Models\Bussiness_model;
use App\Models\TargetAudience;
use App\Models\Startup;
use App\Models\Range;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Looking_for;
use App\Models\Market;
use App\Models\Investor_type;

use Auth; 
use Illuminate\Http\Request;
use Storage;

	class DataService extends MainServices
	{
		static public function getAllStages()
		{
			return Stage::get();
		}
		static public function getAllBussinessModels()
		{
			return Bussiness_model::get();
		}
		static public function getAllTargetAudience()
		{
			return TargetAudience::get();
		}
		static public function getAllIndustries()
		{
			return Industry::get();
		}
		static public function getAllCountry()
		{
			return Country::get();
		}
		static public function getAllRanges()
		{
			return Range::get();
		}
		static public function getAllLookingFor()
		{
			return Looking_for::get();
		}
		static public function geAllMarkets()
		{
			return Market::get();
		}
		static public function geAllInvestorTypes()
		{
			return Investor_type::get();
		}
	}
?>