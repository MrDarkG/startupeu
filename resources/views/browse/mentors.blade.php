@extends("layouts.guest.guest")
@section("content")
    <browse-mentors
        :countries="{{ json_encode($countries) }}"
        :issues="{{ json_encode($issues) }}"
        :fields="{{ json_encode($fields) }}"
        :mentors="{{ json_encode($mentors) }}"
        :countries="{{ json_encode($countries) }}"
    ></browse-mentors>
@endsection
