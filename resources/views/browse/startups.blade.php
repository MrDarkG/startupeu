@extends("layouts.guest.guest")
@section("content")
    <browse-startups
        :countries="{{ json_encode($countries) }}"
        :stages="{{ json_encode($stages) }}"
        :mentors="{{ json_encode($mentors) }}"
        :startups="{{ json_encode($startups) }}"
    ></browse-startups>
@endsection
