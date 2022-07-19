@extends("layouts.guest.guest")
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
                {!! $news->text !!}
            </div>
            <div class="col-md-3">
                <span class="more-news-text mt-0 mb-0">More news</span>
                @foreach($otherNews as $other)
                    <div >
                        <a class="news-more-item" href="{{ route("news.details", [
                                "id" => $other->id,
                                'slug' => generateSlug($other->title)
                                ]) }}">
                            <img src="{{asset('uploads').'/'. $other->image}}" alt="{{ $other->title }}" width="100%">
                            <span>
                                {{ $other->created_at->format("d M, Y") }}
                            </span>
                            <h4>
                                {{ $other->title }}
                            </h4>
                        </a>
                    </div>
               @endforeach
            </div>
        </div>
    </section>
@endsection
