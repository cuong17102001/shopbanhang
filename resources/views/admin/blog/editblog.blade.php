@extends('admin.layouts.layout')
@section('content_admin')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Edit Blog</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('admin/home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                    <div class="card card-body">
                        <form class="form-horizontal m-t-30" method="POST" action="{{ URL::to('admin/edit-blog-form/'.$blog->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title <span class="help" style="color: red"> (*)</span></label><br>
                                @error('title')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                            </div>
                            <div class="form-group">
                                <label>Image</label><br>
                                @error('image')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                @error('description')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror

                                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $blog->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label><br>
                                @error('content')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control" name="content" id="content" cols="30" rows="5"><?php echo $blog->content ?></textarea>
                            </div>
                            <button class="btn btn-success" type="submit" name="submit">Edit</button>

                        </form>
                    </div>
                </div>
            </div>
           
        </div>
      
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
                filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            }
        );

    </script>

@endsection
