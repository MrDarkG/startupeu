@extends("layouts.guest.guest")
@section("content")
    <browse-startups
        :issues="{{ json_encode($issues) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
    ></browse-startups>
@endsection