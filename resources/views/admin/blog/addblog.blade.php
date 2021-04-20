@extends('admin.layouts.layout')
@section('content_admin')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Add Blog</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                    <div class="card card-body">
                        <form class="form-horizontal m-t-30" method="POST" action="{{ URL::to('admin/add-blog-form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title <span class="help" style="color: red"> (*)</span></label><br>
                                @error('title')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label>Image</label><br>
                                @error('image')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                @error('description')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror

                                <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label><br>
                                @error('content')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror

                                <textarea class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                            </div>
                            <button class="btn btn-success" type="submit" name="submit">Add</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
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
