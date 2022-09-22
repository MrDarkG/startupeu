@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
</style>
@section("content")
    <div class="container h-100">
        <div class="container n-details">
            <div>
                Market Information
            </div>
            <div>
               {{ $evosystem->market_information }}
            </div>
        </div>
    </div>
@endsection
