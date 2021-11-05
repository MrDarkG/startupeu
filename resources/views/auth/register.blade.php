@extends("layouts.guest.guest")

@section('content')
<div class="container">
    <user-registration
        :phone_index="{{ json_encode(App\Models\Phone_index::get()) }}"
    ></user-registration>
</div>
@endsection
