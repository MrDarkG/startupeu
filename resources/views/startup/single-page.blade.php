@extends("layouts.guest.guest")
<style>
    /*.news-single-description p ,span{*/
    /*    margin: 0px!important;*/
    /*}*/
</style>
@section("content")
    <startup-single-page
        :startup="{{ $startup }}"
    ></startup-single-page>
@endsection
