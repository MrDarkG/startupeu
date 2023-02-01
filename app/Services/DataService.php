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
use App\Models\Issue;
use Illuminate\Http\Request;

	class DataService extends MainServices
	{
		static public function getAllStages()
		{
			return Stage::get();
		}
        static public function getMarketsByChoosenSide($with){
            $array = [];
            $markets = Market::with($with)->orderBy('created_at')->get();

            foreach ($markets as $market){
                if($market[$with]->count() > 0){
                    array_push($array, $market);
                }
            }
            return $array;
        }
        static public function getRangeByChoosenSide($with){
            $array = [];
            $ranges = Range::with($with)->orderBy('created_at')->get();

            foreach ($ranges as $range){
                if($range[$with]->count() > 0){
                    array_push($array, $range);
                }
            }
            return $array;
        }
        static public function getCountriesByChoosenSide($with){
            $array = [];
            $countries = Country::with($with)->orderBy('title')->get();

            foreach ($countries as $country){
                if($country[$with]->count() > 0){
                    array_push($array, $country);
                }
            }
            return $array;
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
		static public function getAllMarkets()
		{
			return Market::get();
		}
		static public function getAllInvestorTypes()
		{
			return Investor_type::get();
		}
	}
?>
