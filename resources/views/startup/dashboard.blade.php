@extends('layouts.main')
@section('content')
	<startup-dashboard
		:investors="{{ json_encode($investors) }}"
		:types="{{ json_encode($types) }}"
	>
	</startup-dashboard>
@endsection