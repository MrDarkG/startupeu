@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row startup-details">
            <div class="col-md-8">
                <div class="s-d-head" style="border: inherit">
                    <img src="/investor/{{ $investor->logo }}" alt="">
                    <div class="title" style="padding-top: 4px;">QAZTECH VENTURES</div>
                    <div class="green-text">looking_for_startup</div>
                    <ul class="tags">
                        <li><a href="#"></a></li>
                        <li><a href="#">#Europe</a></li>
                        <li><a href="#">#Pre-Seed</a></li>
                    </ul>
                </div>
            </div>
            {{$investor}}
            <div class="col-xl-4 col-md-6">
                <div class="l-box">
                    <div class="desc">Investment range:</div>
                    <div class="title">
                        {{ str_replace(' -', '$ -',$investor->ranges->title) }}$
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="s-info-m in-det row">
                    <div class="col-md-8">
                        <div class="inv-f-l">
                            <p>Successful investments</p>
                            <ul class="tags">
                                <li>
                                    <a href="#">Company #1 • Company #2 • Company #3 • Company #4</a>
                                </li>
                            </ul>
                        </div>
                        <ul class="s-ul pl-0">

                            <li>
                                <p>Stages of interest:</p>
                                <span>Pre-Seed</span>
                            </li>
                            <li>
                                <p>Website:</p>
                                <span>
                                    <a href="https://{{$investor->website}}">
                                        {{ $investor->website }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <p>Email:</p>
                                <span>
                                    <a href="mailto:{{$investor->email}}">
                                        {{ $investor->email }}
                                    </a>
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div>
                            <a href="https://www.startupcentraleurasia.com/en/dashboard/applyForInvestment/27" class="inv-Apply btn">   Apply for Investment
                            </a>
                        </div>
                    </div>
                </div>
                <div class="s-d-body">
                    <div class="t-area">
                        <span>About Us</span>
                        <p>{{ $investor->about }}</p>
                    </div>

                    <div class="t-area">
                        <span>{{ $investor->investments }}</span>
                        <p></p>
                    </div>

                        <a href="https://www.startupcentraleurasia.com/en/dashboard/applyForInvestment/27" onclick="showLoader()" class="btn inv-Apply-blue">Apply for Investment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
