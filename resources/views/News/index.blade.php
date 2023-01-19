@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
    .news-single-image{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 50%;
    }
</style>
@section("content")
    <div class="row container m-auto pt-3 pb-3 pr-2 pl-2">
        @foreach($news as $item)
            <news-card
                :item="{{ json_encode($item) }}"
            ></news-card>
        @endforeach
    </div>
@endsection
