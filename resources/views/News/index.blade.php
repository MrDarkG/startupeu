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
            <div
                class="col-md-4 p-4"
                style="height:404px;"
            >
                <a href="/news/{{urlencode($item->title)}}.{{$item->id}}">
                    <div class="bg-white row h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
                        <div class="col-md-12 p-0 rounded rounded-2">
                            <img
                                class="w-100 p-0"
                                src="/uploads/{{$item->image}}" alt="{{$item->image}}"
                            >
                        </div>
                        <div
                            class="col-md-12 d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start justify-content-between"
                        >
                            @if($item->created_at)
                                <div class="text-black-50">
                                    {{ strtotime($item->created_at) }}
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
