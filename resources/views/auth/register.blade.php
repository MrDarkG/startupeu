@extends("layouts.guest.guest")

@section('content')
<div class="container">
    <div class="row sign-up">
        <div class="col-md-4 left">
            <a href="http://beta.startupcentraleurasia.com/en/" class="sign-logo">
                <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
            </a>

            <div class="sign-text">
                <span>few clicks away from your ecosystem</span>
                <p>Already have an account?<a href="/login">Login</a></p>
            </div>
        </div>
        <div class="col-md-8 right">
            <div class="sign-title">
                sign up        
            </div>

            <form action="register" class="sign-form" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="phone_index">Phone index</label>

                        <select name="phone_index" class="form-control @error('phone_index') is-invalid @enderror" id="phone_index">
                        </select>
                        @error('phone_index')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6  ">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6  ">
                        <label for="re_password">Repeat password</label>
                        <input type="password" id="re_password" name="re_password" value="" class="form-control">
                    </div>
                    <button type="submit" id="submit" class="btn">Create an account</button>
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
