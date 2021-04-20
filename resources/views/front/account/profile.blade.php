@extends('front.layouts.app')

@section('content_front')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">Profile</h2>
        
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                        <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                        <form action="{{URL::to('/update-profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="col-md-12">Full Name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name="name" value="{{$user->name}}" />

                            <label class="col-md-12">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input disabled type="text" name="email" value="{{$user->email}}"/>

                            <label class="col-md-12">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" name="password" />

                            <label class="col-md-12">Phone</label>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name="phone" value="{{$user->phone}}"/>

                            <label class="col-md-12">Address</label>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name="address" value="{{$user->address}}"/>

                            <label class="col-md-12">Country</label>
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <select name="country">
                                <?php foreach ($country as $key => $value) { ?>
                                    <option value="{{$value->id}}" 
                                        @if ($value->id == $user->idCountry)
                                        selected
                                        @endif >{{$value->country}}</option>
                                    <?php } ?>

                            </select>
                            <br><br>

                            <label class="col-md-12">Avatar</label>
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="file" name="avatar"/>
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-4">
                    <img width="100" height="100" style="border-radius: 50%" src="{{asset('upload/admin/'.$user->avatar)}}" alt="">
                </div>
            </div>
        </div>
    
           
        </div>
    </div>
@endsection
