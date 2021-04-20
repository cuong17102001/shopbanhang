@extends('admin.layouts.layout')
@section('content_admin')

    <div class="page-wrapper">
       
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Blog</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($blog as $blg)
                                        
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $blg->title }}</td>
                                            <td><img width="100" height="120" src="{{ asset('upload/admin/'.$blg->image) }}" alt=""></td>
                                            <td>{{ $blg->description }}</td>
                                            <td><a href="{{URL::to('admin/edit-blog/'.$blg->id)}}">Edit</a></td>
                                            <td><a href="{{URL::to('admin/delete-blog/'.$blg->id)}}"><i class="fas fa-trash-alt"></i>Delete</a></td>
                                        </tr>
                                        <?php $i++ ?>
                                    @endforeach
                                </tbody>
                            </table>   
                        </div>
                        <a href="{{ URL::to('admin/add-blogs') }}" class="btn btn-success" style="color: white">add blog</a>
                    </div>
                </div>
            </div>
        
        </div>
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>

@endsection
