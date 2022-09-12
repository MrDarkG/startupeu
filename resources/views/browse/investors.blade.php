@extends("layouts.guest.guest")
@section("content")
    <browse-investors
        :issues="{{ json_encode($issues) }}"
        :fields="{{ json_encode($fields) }}"
        :investors="{{ json_encode($investors) }}"
        :countries="{{ json_encode($countries) }}"
    ></browse-investors>
@endsection
