@extends('layouts.main')
@section('content')
@php
use App\Services\DataService;
@endphp
	<startup-dashboard
		:investors="{{ json_encode($investors) }}"
		:types="{{ json_encode($types) }}"
		:stages="{{ json_encode(DataService::getAllStages()) }}"
		:bussiness_models="{{ json_encode(DataService::getAllBussinessModels()) }}"
		:TargetAudienc="{{ json_encode(DataService::getAllTargetAudienc()) }}"
		:Industries="{{ json_encode(DataService::getAllIndustries()) }}"
		:country="{{ json_encode(DataService::getAllCountry()) }}"
		:ranges="{{ json_encode(DataService::getAllRanges()) }}"
		:looking_for="{{ json_encode(DataService::getAllLookingFor()) }}"
		:Markets="{{ json_encode(DataService::getAllMarkets()) }}"
		:Investor_types="{{ json_encode(DataService::getAllInvestorTypes()) }}"
	></startup-dashboard>
@endsection
