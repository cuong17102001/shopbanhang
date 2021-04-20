@extends('front.layouts.app')

@section('content_front')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">Latest From our Blog</h2>
            @foreach ($blog as $bl)
                <div class="single-blog-post">
                    <h3>{{$bl->title}}</h3>
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-user"></i> Mac Doe</li>
                            <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                            <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                        </ul>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </span>
                    </div>
                
                        <img height="300" src="{{ asset('upload/admin/'.$bl->image) }}" alt="">

                    <p>{{$bl->description}}</p>
                    <a class="btn btn-primary" href="{{URL::to('/blog-detail/'.$bl->id)}}">Read More</a>
                </div>
            @endforeach
            <div class="pagination-area">
                <ul class="pagination">
                    
                    <li>{{ $blog->links() }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
