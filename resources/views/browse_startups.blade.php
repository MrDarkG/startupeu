@extends("layouts.guest.guest")
@section("content")
    <browse-mentors
        :startups="{{ json_encode($startups) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
    ></browse-mentors>
@endsection