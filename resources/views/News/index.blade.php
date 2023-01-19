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
        border-bottom-right-radius: unset !important;
        border-bottom-left-radius: unset !important;
    }
</style>
@section("content")
    <div class="row container m-auto pt-3 pb-3 pr-2 pl-2">
        @foreach($news as $item)
            <div
                class="col-md-4 p-4"
                style="height:404px;"
            >
                <a href="/news/{{urlencode($item->title)}}.{{$item->id}}">
                    <div class="bg-white d-flex flex-column h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
                        <div
                            class="d-flex p-0 w-100 rounded rounded-2 news-single-image"
                            style="
                                background-image: url('/uploads/{{$item->image}}');
                            "
                        ></div>
                        <div
                            class="d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start justify-content-between"
                            style="height: 50%;"
                        >
                            @if($item->created_at)
                                <div class="text-black-50">
                                    {{ date("F jS, Y", strtotime($item->created_at)) }}
                                </div>
                            @endif
                            <div class="pt-2">
                                <b>
                                    <h4 class="m-0 p-0">
                                        {{$item->title}}
                                    </h4>
                                </b>
                            </div>
                            <div class="pt-2">
                                <h6 class="text-black-50 latestnews-desc">
                                    {!! $item->description !!}
                                </h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
