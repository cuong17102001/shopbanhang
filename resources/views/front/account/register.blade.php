@extends('front.layouts.app')

@section('content_front')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>sign up for an account</h2>
                        <form action="" method="POST">
                            @csrf
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" placeholder="Name" name="name" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" placeholder="Email Address" name="email" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" placeholder="Password" name="password" />
                            @error('repassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" placeholder="Enter the password" name="repassword" />
                            <button type="submit" class="btn btn-default">Sigup</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
