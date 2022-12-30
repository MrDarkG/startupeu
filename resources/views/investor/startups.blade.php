@extends("layouts.investor")
<style>
    .startup-list-search{
        background-color: unset!important;
    }
</style>
@section("content")
    <div class="d-flex pt-5 flex-column justify-content-between">
        <browse-startups
            :countries="{{ json_encode($countries) }}"
            :stages="{{ json_encode($stages) }}"
            :mentors="{{ json_encode($mentors) }}"
            :startups="{{ json_encode($startups) }}"
        ></browse-startups>
    </div>
@endsection
