@extends("layouts.guest.guest")
@section("content")
    <browse-startups
        :startups="{{ json_encode($startups) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
    ></browse-startups>
@endsection