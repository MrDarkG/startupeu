@extends('voyager::master')
@section('css')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
@endsection
@section('content')
    <div id="app">
        <div class="font-weight-bold">
            <h3>Events</h3>
        </div>
        <admin-events
            :events="{{ json_encode($events) }}"
        ></admin-events>
    </div>
    <script
        src="{{ asset('js/app.js') }}"
    ></script>
@endsection
