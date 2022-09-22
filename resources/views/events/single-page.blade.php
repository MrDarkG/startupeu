@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
</style>
@section("content")
    <div class="container">
        <div class="container n-details">
            <div>
                <h2 class="m-0 font-weight-bold">
                    {{ $event->title }}
                </h2>
            </div>
            <div class="mt-3 mb-3">
                {{ $event->date }}
            </div>
            <div
                class="mb-3"
                style='
                    border-radius: 20px;
                '
            >
                <img
                    class="w-100 shadow"
                    src="{{ asset('/assets/images/events/uploads')."/".$event->image }}"
                    alt=""
                    style="border-radius: 20px;"
                >
            </div>
            <div class="mt-3 mb-5 pb-5 event-description">
                {!! $event->description !!}
            </div>
        </div>
    </div>
@endsection
