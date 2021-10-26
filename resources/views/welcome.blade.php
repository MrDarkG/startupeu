@extends("layouts.guest.guest")
@section("content")
    <section class="main-section container">
        <div class="row">

            <div class="col-md-6">
                <span>Startup Central Eurasia</span>
                <h3>Ecosystem guide</h3>
                <p>Get information for the regional growth, use smart matching tools for the startups and investors, find mentors !</p>
                <div class="mt-4">
                    
                    <a href="/register" class="c-started mt-4">Get Started</a>
                </div>
            </div>

            <div class="col-md-6">
                <img class="main-b-image" src="/assets/images/sec-img.svg" alt="">
            </div>

        </div>

        <div class="boxes row">
            <div class="col-md-4 mp30">
                <a href="startups">
                    <div class="box1">
                        <img src="/assets/images/box1.svg" alt="">
                        <span>Startups</span>
                        <p>Startups box text</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mp30">
                <a href="investors">
                    <div class="box2">
                        <img src="/assets/images/box2.svg" alt="">
                        <span>Inverstors</span>
                        <p>Inverstors box text</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mp30">
                <a href="mentors">

                    <div class="box3">
                        <img src="/assets/images/box3.svg" alt="">
                        <span>Mentors</span>
                        <p>Mentors box text</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection