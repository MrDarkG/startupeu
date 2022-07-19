@extends("layouts.guest.guest")

@section('content')
<div class="container-fluid">
    <user-registration
        :stages="{{ App\Services\DataService::getAllStages() }}"
        :bussinesModels = "{{ App\Services\DataService::getAllBussinessModels() }}"
        :countries = "{{ App\Services\DataService::getAllCountry() }}"
        :industries = "{{ App\Services\DataService::getAllIndustries() }}"
        :ranges = "{{ App\Services\DataService::getAllRanges() }}"
        :lookingFor = "{{ App\Services\DataService::getAllLookingFor() }}"
        :markets = "{{ App\Services\DataService::getAllMarkets() }}"
        :investorTypes = "{{ App\Services\DataService::getAllInvestorTypes() }}"
        :phone_index="{{ json_encode(App\Models\Phone_index::get()) }}"
    ></user-registration>
</div>
@endsection
