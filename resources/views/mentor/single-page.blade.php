@extends("layouts.guest.guest")
@section("content")
    <mentor-single-page
        :mentor="{{ $mentor }}"
    ></mentor-single-page>
@endsection
