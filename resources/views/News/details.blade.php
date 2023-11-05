@extends("layouts.guest.guest")
<style>
    /*.news-single-description p ,span{*/
    /*    margin: 0px!important;*/
    /*}*/
</style>
@section("content")
    <section class="main-section mt-5 container">
        <div class="row news-details justify-content-between">
            <div class="col-md-9">
                <h1 class="mb-3">
                    {{ $news->title }}
                </h1>
                <div class="mt-3 mb-3">
                    <small class="mt-2 mb-2" style="font-size: 15px;">
                        {{ $news->created_at->format("d M, Y") }}
                    </small>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-9 d-flex flex-column justify-content-between">
                <div>
                    <img src="{{ asset('uploads').'/'.$news->image}}" alt="{{ $news->title }}" width="100%">
                    <div class="news-single-description">
                        {!! $news->text !!}
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    @foreach($buttons as $button)
                        @if($button->is_visible)
                            <a
                                class="event-det-btn m-0"
                                href="{{ $button->url }}"
                                style="background:{{ $button->color }};"
                            >
                                {{ $button->title }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 ">
                <h2 class="mt-0 mb-0 font-weight-bold text-black m-0" style="font-size: 22px;">More news</h2>
                @foreach($otherNews->take(3) as $other)
                    <div>
                        <a
                            class="news-more-item"
                            href="{{route("news.details",[
                                "id" => $other->id,
                                'slug' => generateSlug($other->title)
                            ])}}"
                        >
                            <div
                                class="bg-white d-flex flex-column h-100 rounded-2 overflow-hidden"
                                style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);"
                            >
                                <div
                                    :style="{
                                        backgroundImage:`url('/uploads/{{$other->image}}')`
                                    }"
                                    class="news-single-image d-flex p-0 w-100 rounded-top"
                                ></div>
                                <div
                                    class="d-flex overflow-hidden pl-4 pr-4 pt-3 mb-2 flex-column align-items-start justify-content-between"
                                    style="height: 50%;"
                                >
                                    <div class="pt-2">
                                        <b>
                                            <h4 class="m-0 p-0">
                                                {{ $other->title }}
                                            </h4>
                                        </b>
                                    </div>
                                    <div class="pt-2">
                                        <h6
                                            class="text-black-50 latestnews-desc"
                                        >
                                            {{ $other->created_at->format("d M, Y") }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a>
                            <img src="" width="100%">
                        </a>
                    </div>
                @endforeach
                <a
                    href="/news"
                    class="event-det-btn cursor-pointer m-0 w-100 pt-3 pb-3 btn-primary border-0 font-weight-bold"
                    style="background: rgba(98, 0, 238, 0.1);border-radius: 16px;color:#6200EE;"
                >
                    See More News
                </a>
            </div>
        </div>
    </section>
@endsection
