@extends('front.layouts.app')

@section('content_front')
   
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                        <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                        <form action="#" method="POST">
                            @csrf
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" placeholder="email" name="email"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" placeholder="password" name="password"/>
                            <span>
                                <input type="checkbox" class="checkbox" name="remember">
                                Keep me signed in

                            </span>
                            <p> If you don't have an account,<a href="{{ URL::to('/member-register') }}"> sign up now</a>
                            </p>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </div>

    <!--/form-->
@endsection
