@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
</style>
@section("content")
    <div class="row container m-auto pt-3 pb-3 pr-2 pl-2">
        @foreach($news as $item)
            <news-card
                class="col-12 col-sm-12 col-md-6 col-lg-4"
                :item="{{ json_encode($item) }}"
            ></news-card>
        @endforeach
    </div>
@endsection
