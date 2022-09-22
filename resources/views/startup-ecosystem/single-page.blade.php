@extends("layouts.guest.guest")
<style>
    .event-description a{
        color: blue;
        text-decoration: underline;
    }
</style>
@section("content")
    <div class="container h-100">
        <div class="container n-details">
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
                    {{ json_decode($startup_ecosystem->pdf, true) }}
                <a href="/uploads/">
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
        <div class="container n-details">
            <country-faqs
                :categories="{{ json_encode($categories) }}"
            ></country-faqs>
        </div>
    </div>
@endsection
