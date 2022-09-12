@extends("layouts.guest.guest")
@section("content")
    <browse-startups
        :countries="{{ json_encode($countries) }}"
        :issues="{{ json_encode($issues) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
        :startups="{{ json_encode($startups) }}"
    ></browse-startups>
@endsection
