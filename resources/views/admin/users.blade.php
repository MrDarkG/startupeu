@extends('voyager::master')
@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/costum.css">
@endsection
@section('content')
    @php
        use App\Services\DataService;
    @endphp
    <div id="app" class="container">
        <admin-users
            :users="{{ json_encode(App\Models\User::get()) }}"
            :issues="{{ json_encode($issues) }}"
            :fields="{{ json_encode($fields) }}"
            :phone_index="{{ json_encode($phone_index) }}"
            :stages="{{ json_encode(DataService::getAllStages()) }}"
            :bussines_models = "{{ json_encode(DataService::getAllBussinessModels()) }}"
            :countries = "{{ json_encode(DataService::getAllCountry()) }}"
            :industries = "{{ json_encode(DataService::getAllIndustries()) }}"
            :investment_range = "{{ json_encode(DataService::getAllRanges()) }}"
            :looking_for = "{{ json_encode(DataService::getAllLookingFor()) }}"
            :markets = "{{ json_encode(DataService::getAllMarkets()) }}"
            :investor_types = "{{ json_encode(DataService::getAllInvestorTypes()) }}"
        ></admin-users>
    </div>
    <script
        src="{{ asset('js/app.js') }}"
    ></script>
@endsection
