@extends("layouts.guest.guest")
@section("content")
@php
    use App\Services\DataService;
@endphp
    <choose-side
        :stages="{{ json_encode(DataService::getAllStages()) }}"
        :bussines_models = "{{ json_encode(DataService::getAllBussinessModels()) }}"
        :countries = "{{ json_encode(DataService::getAllCountry()) }}"
        :industries = "{{ json_encode(DataService::getAllIndustries()) }}"
        :investment_range = "{{ json_encode(DataService::getAllRanges()) }}"
        :looking_for = "{{ json_encode(DataService::getAllLookingFor()) }}"
        :markets = "{{ json_encode(DataService::geAllMarkets()) }}"
        :investor_types = "{{ json_encode(DataService::geAllInvestorTypes()) }}"
    ></choose-side>
@endsection