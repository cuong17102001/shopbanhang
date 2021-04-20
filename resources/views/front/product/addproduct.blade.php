@extends('front.layouts.app')

@section('content_front')
<style>
    .hide{
        display: none;
    }
</style>
<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Add product</h2>
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                        <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                        <form action="{{URL::to('account/addproduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="text" name="name" placeholder="name" />

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="text" name="price" placeholder="price" />

                            @error('categoryId')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <select name="categoryId">
                                @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->category}}</option>
                                @endforeach
                            </select><br><br>

                            @error('brandId')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <select name="brandId">
                                @foreach($brand as $value)
                                <option value="{{$value->id}}">{{$value->brand}}</option>
                                @endforeach
                            </select><br><br>

                            @error('sale')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <select name="sale" id="sale" onchange="hide()">
                                <option value="0">new</option>
                                <option value="1">sale</option>
                            </select><br><br>

                            @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="discount" class="hide" width="200" type="text" name="discount" placeholder="discount ( % )" />

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="image" type="file" multiple name="image[]"  />
                            <img width="50" height="75" id="img0" style="display: none" src="" alt="">
                            <img width="50" height="75" id="img1" style="display: none" src="" alt="">
                            <img width="50" height="75" id="img2" style="display: none" src="" alt=""> 

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                            @enderror
                            <textarea name="description" placeholder="description"></textarea>
                            <button type="submit" class="btn btn-default">Add</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#image').change(function(event) {
        // alert(URL.createObjectURL(event.target.files[0]))
        for (var i = 0; i <= 2; i++) {
            $('#img'+ i).attr({
                'src': URL.createObjectURL(event.target.files[i]),
         });
            $('#img'+ i).css({
                'display': 'block',
                'float' : 'left'
            });
        }

    });
    function hide(){
        // alert($('#sale :selected').val())
        if($('#sale').val() == 1){
            $('#discount').removeClass('hide');
        }else{
            $('#discount').addClass('hide');
        }
    }
</script>
@endsection
