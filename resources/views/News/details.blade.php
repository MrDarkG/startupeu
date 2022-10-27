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
                    <small  class="mt-2 mb-2" style="font-size: 15px;">
                        {{ $news->created_at->format("d M, Y") }}
                    </small>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <img src="{{asset('uploads').'/'.$news->image}}" alt="{{ $news->title }}" width="100%">
                <div class="news-single-description" v-html="{{ $news->text }}">
{{--                    {!! $news->text !!}--}}
                </div>
            </div>
            <div class="col-md-3 ">
                <h2 class="mt-0 mb-0 font-weight-bold text-black m-0" style="font-size: 22px;">More news</h2>
                @foreach($otherNews->take(3) as $other)
                    <div >
                        <a class="news-more-item" href="{{ route("news.details", [
                                "id" => $other->id,
                                'slug' => generateSlug($other->title)
                                ]) }}">
                            <img src="{{ asset('/uploads').'/'. $other->image}}" alt="{{ $other->title }}" width="100%">
                            <span class="ml-2 mr-2">
                                {{ $other->created_at->format("d M, Y") }}
                            </span>
                            <h4 class="ml-2 mr-2">
                                {{ $other->title }}
                            </h4>
                        </a>
                    </div>
                @endforeach
                <div
                    class="btn w-100 pt-3 pb-3 btn-primary border-0 font-weight-bold"
                    style="background: rgba(98, 0, 238, 0.1);border-radius: 16px;color:#6200EE;"
                >
                    See More News
                </div>
            </div>
        </div>
    </section>
@endsection
