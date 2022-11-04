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
    <div id="app" class="container">
        <div class="font-weight-bold">
            <h3>Single page</h3>
        </div>
        <admin-singlepage
            :selected="{{ json_encode($singlePage) }}"
            :news="{{ json_encode($news) }}"
            :buttons="{{ json_encode($buttons) }}"
        ></admin-singlepage>
    </div>
    <script
        src="{{ asset('js/app.js') }}"
    ></script>
@endsection
