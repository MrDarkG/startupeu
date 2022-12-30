@extends("layouts.investor")
@section("content")
    <div class="d-flex pt-5 flex-column justify-content-between">
        <div class="mt-2 pl-5">
            <a
                href="/investor/dashboard/index"
                class="border-bottom text-center"
            >
                <arrow
                    :size="{
                        width: '20',
                        height: '28'
                    }"
                    color="#3700b3"
                    rotate="true"
                    opacity="true"
                    class="mr-2"
                ></arrow>
            </a>
        </div>
        <startup-my-account
            :startup="{{ json_encode($startup) }}"
            :data="{{ json_encode($data) }}"
            :is_editable="false"
        ></startup-my-account>
    </div>
@endsection
