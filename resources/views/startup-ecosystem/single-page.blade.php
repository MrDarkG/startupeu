@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
    .container .n-details p br{
        display: none!important;
    }
</style>
@section("content")
    <div class="container">
        <div class="container n-details">
            <div class="row m-0">
                <div class="col-md-6 pl-0 pr-0">
                    <div class="mb-3">
                        <h3 class="m-0">
                            Market Information
                        </h3>
                    </div>
                    <div class="mb-5 pb-5">
                        <h1 class="m-0 font-weight-bold" style="color:#3700b3;">
                            {{ $startup_ecosystem->title }}
                        </h1>
                    </div>
                    <div class="mb-3 mt-5 pt-5">
                        <a href="/uploads/{{ $startup_ecosystem->pdf }}" target="_blank">
                            <div
                                class="btn pl-4 pr-4"
                                style="background:#e1d7f4;border-radius: 16px;"
                            >
                                <div class="d-flex align-items-center justify-content-between pt-1 pb-1">
                                    <div>
                                        <img src="https://startupcentraleurasia.com/themes/application/Components/svg/arrow.svg" alt="">
                                    </div>
                                    <div
                                        class="border-white ml-2 mr-2"
                                        style="border-left:solid 2px black;color:#e1d7f4;"
                                    >.</div>
                                    <div>
                                        Download PDF
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pl-0 pr-0">
                    @if(!is_null($startup_ecosystem->country_visual))
                        <img
                            src="{{ asset('uploads').'/'.$startup_ecosystem->country_visual }}"
                            alt=""
                            width="100%"
                        >
                    @endif
                </div>
            </div>
        </div>
        <div class="container n-details mt-0">
            <country-faqs
                :ecosystem_id = "{{$startup_ecosystem->id}}"
                :categories="{{ json_encode($categories) }}"
            ></country-faqs>
        </div>
    </div>
@endsection
