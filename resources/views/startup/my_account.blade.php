@extends('layouts.main')

@section('content')
	<startup-my-account
        :startup="{{json_encode($startup)}}"
        :data="{{json_encode($data)}}"
	></startup-my-account>
@endsection
