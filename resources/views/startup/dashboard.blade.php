@extends('layouts.main')
@section('content')
	<startup-dashboard
		:investors="{{ json_encode($investors) }}"
	>
	</startup-dashboard>
@endsection