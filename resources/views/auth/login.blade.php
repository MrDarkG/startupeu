@extends("layouts.guest.guest")
@section("content")
<div class="container">
    <div class="row sign-up">
        <div class="col-md-4 left">
            <a href="http://beta.startupcentraleurasia.com/en/" class="sign-logo">
                <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
            </a>
            <div class="sign-text">
                <span>Few clicks away from your Ecosystem</span>
                <p>New here?                
                    <a href="/register">Sign up</a>
                </p>
            </div>
        </div>
        <div class="col-md-8 right">
            <div class="sign-title">
                Sign in        
            </div>
            <form action="/login" class="sign-form" method="post" id="login-form" novalidate="novalidate">
                <div class="row">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="email" class="col-md-4 col-form-label text-md-right p-0 pb-2">{{ __('E-Mail Address') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="password" class="col-md-4 col-form-label p-0 pb-2">{{ __('Password') }}</label>
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn">Login</button>
                    </form>
                    <div class="clear"></div>
                    <div class="social-sign">
                        <a href="" class="g-btn"><img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/g-sign.svg" alt=""></a>
                        <a href="" class="fb-btn"><img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/f-sign.svg" alt=""></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection