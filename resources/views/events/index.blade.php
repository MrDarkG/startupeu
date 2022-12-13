@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
</style>
@section("content")
    <div class="row pl-3 pr-3 m-0">
        @foreach($events as $event)
            <div class="col-12 col-md-12 col-lg-4 mt-3 p-4">
                <div
                    class="pt-5 pb-5 pl-4 overflow-hidden pr-4"
                    style="
                            background:{{$event->card_color}};
                            color:{{$event->card_color=='white'?'black':'white'}};
                            height: 358px;
                            border-radius: 36px;
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
                        <div class="col-7 d-flex flex-column justify-content-between ecosystem-text">
                            <div>
                                <h6 class="m-0">{{ $event->date }}</h6>
                            </div>
                            <div class="font-weight-bold">
                                {{ $event->title }}
                            </div>
                            <div>
                                <a
                                    href="{{
                                            route('singleEvent',[
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
@endsection
