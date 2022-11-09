@extends("layouts.guest.guest")
@section("content")
    <browse-investors
        :markets="{{ json_encode($markets) }}"
        :ranges="{{ json_encode($ranges) }}"
        :fields="{{ json_encode($fields) }}"
        :investors="{{ json_encode($investors) }}"
        :countries="{{ json_encode($countries) }}"
    ></browse-investors>
@endsection
