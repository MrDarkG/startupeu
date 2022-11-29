@extends("layouts.guest.guest")
@section("content")
    <investor-single-page
        :investor="{{ $investor }}"
    ></investor-single-page>
@endsection
