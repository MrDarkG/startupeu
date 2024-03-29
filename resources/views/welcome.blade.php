@extends("layouts.guest.guest")
@section("content")
    <section class="main-section container">
        <div class="row">
            <div class="col-md-6">
                <span>Startup Central Eurasia</span>
                <h3 class="main-text">Ecosystem guide</h3>
                <p>Get information for the regional growth, use smart matching tools for the startups and investors,
                    find mentors !</p>
                <div class="mt-4">
                    <a href="/register" class="c-started mt-4">Get Started</a>
                </div>
            </div>
            <div class="col-md-6">
                <img class="main-b-image" src="/assets/images/sec-img.svg">
            </div>
        </div>
        <user-type-cards
        ></user-type-cards>
    </section>
    <section class="main-section container pl-0 pr-0">
        <div class="pl-3 font-weight-bold" style="font-size: 50px;">
            Startup Ecosystem Guide
        </div>
        <div class="row m-0 mt-4">
            @foreach($ecosystem as $eco)
                <div class="col-6 col-sm-4 col-md-5 mt-3 pl-2 pr-2" style="height:182px;">
                    <a href="/startup-ecosystem/{{$eco->id}}">
                        <div class="pt-5 pb-5 pl-4 pr-4 bg-white"
                             style="height: 182px;;border-radius: 36px;box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.04);">
                            <div class="d-flex h-100 flex-column justify-content-between">
                                <div>
                                    <img width="40" src="/uploads/{{ $eco->image }}">
                                </div>
                                <div class="ecosystem-text">
                                    {{ $eco->title }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <section class="main-section container">
        <div>
            <div>
                <h1 class="font-weight-bold" style="font-size: 50px;">Latest Startups</h1>
            </div>
            <div class="pl-0 pt-2 pb-2 pr-2">
                <h5>Here you can find latest startups about central EurAsian Startup ecosystem </h5>
            </div>
        </div>
        <startup-cards
            class="mt-4 row m-0"
            :startups="{{ json_encode($startups) }}"
        ></startup-cards>
        <div class="mt-4 d-flex align-items-center justify-content-center">
            <a
                style="color:white;background: #03dac5;border-radius: 16px;"
               class="btn pl-5 pr-5 pt-3 pb-3 font-weight-bold"
               href="/browse/startups"
            >
                Show All Startups
            </a>
        </div>
    </section>
    <section class="main-section container">
        <div>
            <div>
                <h1 class="font-weight-bold" style="font-size: 50px;">Latest News</h1>
            </div>
            <div class="pl-0 pt-2 pb-2 pr-2">
                <h5>Here you can find latest news about central EurAsian Startup ecosystem </h5>
            </div>
        </div>
        <latest-news
            :news="{{ json_encode($news) }}"
        ></latest-news>
        <div class="mt-4 d-flex align-items-center justify-content-center">
            <a style="color:white;background: #03dac5;border-radius: 16px;"
               class="btn pl-5 pr-5 pt-3 pb-3 font-weight-bold" href="/news">
                Show All News
            </a>
        </div>
    </section>
    <section class="main-section pl-0 pr-0 container">
        <div class="pl-3">
            <div>
                <h1 class="font-weight-bold" style="font-size: 50px;">Events</h1>
            </div>
            <div class="pl-0 pt-2 pb-2 pr-2">
                <h5>
                    Here you can find information regarding latest events
                </h5>
            </div>
        </div>
        <div class="row m-0">
            @foreach($events as $event)
                <div class="col-12 col-md-12 col-lg-6 mt-3 p-4">
                    <div
                        class="pt-5 pb-5 pl-4 pr-4"
                        style="
                            background:{{$event->card_color}};
                            color:{{$event->card_color=='white'?'black':'white'}};
                            height: 358px;
                            border-radius: 36px;
                            box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);
                        "
                    >
                        <div class="row m-0 h-100">
                            <div class="col-5 h-100 position-relative">
                                <div
                                    class="position-absolute w-100 shadow event-card"
                                    style="
                                        background-color:white;
                                        background:url('/assets/images/events/uploads/{{ $event->image }}');
                                        background-repeat: no-repeat;
                                        background-size: cover!important;
                                        background-position: center;
                                        border-radius: 36px;
                                        left:-50px;
                                        height:200px;
                                    "
                                ></div>
                            </div>
                            <div
                                class="col-7 pl-0 pr-0 pl-sm-2 pr-sm-2 h-100 d-flex flex-column justify-content-between ecosystem-text">
                                <div>
                                    <h6 class="m-0">{{ $event->date }}</h6>
                                </div>
                                <div class="font-weight-bold overflow-hidden h-100">
                                    {{ $event->title }}
                                </div>
                                <div>
                                    <a
                                        href="{{
                                            route('singleEvent',[
                                                'slug' => urlencode($event->title),
                                                'event_id' => $event->id
                                            ])
                                        }}"
                                    >
                                        <h6 class="m-0">Learn more</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 d-flex align-items-center justify-content-center">
            <a style="color:white;background: #fb2c53;border-radius: 16px;"
               class="btn pl-5 pr-5 pt-3 pb-3 font-weight-bold" href="/events">
                Show All Events
            </a>
        </div>
    </section>
@endsection
