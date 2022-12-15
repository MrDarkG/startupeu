@extends('layouts.main')

@section('content')
	<my-account
        :startup="{{json_encode($startup)}}"
        :data="{{json_encode($data)}}"
	></my-account>
@endsection
