@extends("layouts.guest.guest")
@section("content")
    <mentor-registration
    :data="{{ json_encode($data) }}"
    :countries="{{ json_encode($country ) }}"></mentor-registration>

@endsection