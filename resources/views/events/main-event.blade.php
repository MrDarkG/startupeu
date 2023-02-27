@extends("layouts.guest.guest")
@section("content")
    <section class="main-section mt-5 container">
        <div class="row news-details justify-content-between">
            <div class="col-md-9">
                <h1 class="mb-3">
                    {{ $event->title }}
                </h1>
                <div class="mt-3 mb-3">
                    <small class="mt-2 mb-2" style="font-size: 15px;">
                        @if($event->created_at)
                            {{ $event->created_at->format("d M, Y") }}
                        @endif
                    </small>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-9 d-flex flex-column justify-content-between">
                <div>
                    <img
                        src="{{ '/assets/images/events/uploads/'. $event->image}}"
                        alt="{{ $event->title }}"
                        width="100%"
                    >
                    <div class="news-single-description">
                        {!! $event->description !!}
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
                <h2
                    class="mt-0 mb-0 font-weight-bold text-black m-0"
                    style="font-size: 22px;"
                >
                    More events
                </h2>
                @foreach($otherEvents as $o_event)
                    <div>
                        <a
                            class="news-more-item"
                            href="{{
                                route("events.main", [
                                    "id" => $o_event->id,
                                    'slug' => generateSlug($o_event->title)
                                ])
                            }}"
                        >
                            <img
                                src="{{ '/assets/images/events/uploads/'. $o_event->image}}"
                                alt="{{ $o_event->title }}"
                                width="100%"
                            >
                            <span class="ml-2 mr-2">
                                @if($o_event->created_at)
                                    {{$o_event->created_at->format("d M, Y")}}
                                @endif
                            </span>
                            <h4 class="ml-2 mr-2">
                                {{ $o_event->title }}
                            </h4>
                        </a>
                    </div>
                @endforeach
                <a
                    href="/events"
                    class="event-det-btn m-0 w-100 pt-3 pb-3 btn-primary border-0 font-weight-bold"
                    style="background: rgba(98, 0, 238, 0.1);border-radius: 16px;color:#6200EE;"
                >
                    See More News
                </a>
            </div>
        </div>
    </section>
@endsection
