@extends('layouts.main')
@section('content')
@php
use App\Services\DataService;
@endphp
	<startup-dashboard
		:investors="{{ json_encode($investors) }}"
		:types="{{ json_encode($types) }}"
		:stages="{{ json_encode(DataService::getAllStages()) }}"
		:BussinessModels="{{ json_encode(DataService::getAllBussinessModels()) }}"
		:TargetAudienc="{{ json_encode(DataService::getAllTargetAudienc()) }}"
		:Industries="{{ json_encode(DataService::getAllIndustries()) }}"
		:Country="{{ json_encode(DataService::getAllCountry()) }}"
		:Ranges="{{ json_encode(DataService::getAllRanges()) }}"
		:LookingFor="{{ json_encode(DataService::getAllLookingFor()) }}"
		:Markets="{{ json_encode(DataService::getAllMarkets()) }}"
		:InvestorTypes="{{ json_encode(DataService::getAllInvestorTypes()) }}"
	></startup-dashboard>
@endsection
