@extends("layouts.guest.guest")
@section("content")
@php
    use App\Services\DataService;
@endphp
    <choose-side
        :stages="{{ json_encode(DataService::getAllStages()) }}"
        :bussinesModels = "{{ json_encode(DataService::getAllBussinessModels()) }}"
        :countries = "{{ json_encode(DataService::getAllCountry()) }}"
        :industries = "{{ json_encode(DataService::getAllIndustries()) }}"
        :ranges = "{{ json_encode(DataService::getAllRanges()) }}"
        :lookingFor = "{{ json_encode(DataService::getAllLookingFor()) }}"
        :markets = "{{ json_encode(DataService::getAllMarkets()) }}"
        :investorTypes = "{{ json_encode(DataService::getAllInvestorTypes()) }}"
    ></choose-side>
@endsection