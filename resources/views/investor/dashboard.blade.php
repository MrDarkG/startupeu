@extends("layouts.investor")
@section("content")
    <investor-dashboard
        :startups="{{ $startups }}"
        :statuses="{{ json_encode($apply_status)  }}"
    ></investor-dashboard>
@endsection
