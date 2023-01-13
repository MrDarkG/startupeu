@extends("layouts.mentor")
@section("content")
    <mentor-dashboard
        :mentor="{{json_encode($mentor)}}"
        :data="{{ json_encode($data) }}"
    ></mentor-dashboard>
@endsection
