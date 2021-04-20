@extends('front.layouts.app')

@section('content_front')
    <div class="col-sm-9">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">Features Items</h2>

            <div class="container">
                <div class="row">
                    <form method="POST" action="{{ URL::to('/search-advanced') }}">
                        @csrf

                        <input type="text" name="name" placeholder="Name">
                        <select name="price" id="">
                            <option value="">choose price</option>
                            <option value="1">1-20$</option>
                            <option value="2">20-40$</option>
                            <option value="3">40-100$</option>
                            <option value="4">
                                more than 100 $</option>
                        </select>
                        <select name="category" id="">
                            <option value="">category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                        <select name="brand" id="">
                            <option value="">brand</option>
                            @foreach ($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->brand }}</option>
                            @endforeach
                        </select>



                        <button class="btn btn-primary" type="submit">search</button>
                    </form>
                </div>
            </div>

            @foreach ($product as $item)
                <?php $image = json_decode($item->image); ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('upload/product/' . $item->userId . '/' . $image[0]) }}" alt="" />
                                <h2>${{ $item->price }}</h2>
                                <p>{{ $item->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>${{ $item->price }}</h2>
                                    <p>{{ $item->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--features_items-->
    </div>
    <script>
        $(document).ready(function() {
            $('.slider-selection').slider({
                min : 0,
                max : 500,
                slide : function(event,ui){
                    
                }
            });​
        });

    </script>
@endsection
