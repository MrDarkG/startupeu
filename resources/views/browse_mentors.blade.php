@extends("layouts.guest.guest")
@section("content")
    <browse-mentors
        :issues="{{ json_encode($issues) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
        :contries="{{ json_encode($contries) }}"
    ></browse-mentors>
@endsection