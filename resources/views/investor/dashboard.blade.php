@extends("layouts.investor")
@section("content")
    <investor-dashboard
        :startups="{{ json_encode($startups) }}"
    ></investor-dashboard>
@endsection
