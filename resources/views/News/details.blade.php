@extends("layouts.guest.guest")
<style>
    .news-single-description p ,span{
        margin: 0px!important;
    }
</style>
@section("content")
    <section class="main-section container">
        <div class="row news-details justify-content-between">
            <div class="col-md-9">
                <h1>
                    {{ $news->title }}
                </h1>
                <img src="{{asset('uploads').'/'.$news->image}}" alt="{{ $news->title }}" width="100%">
                <small>
                    {{ $news->created_at->format("d M, Y") }}
                </small>
                <div class="news-single-description">
                    {!! $news->text !!}
                </div>
            </div>
            <div class="col-md-3">
                <span class="more-news-text mt-0 mb-0">More news</span>
                @foreach($otherNews as $other)
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
            </div>
        </div>
    </section>
@endsection
