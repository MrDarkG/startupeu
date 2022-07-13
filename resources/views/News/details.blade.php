@extends("layouts.guest.guest")
@section("content")
    <section class="main-section container">
        <div class="row">
            <div class="col-md-8">
                <h1>
                    {{ $news->title }}
                </h1>
                <small>
                    {{ $news->created_at->format("d M, Y") }}
                </small>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
@endsection
