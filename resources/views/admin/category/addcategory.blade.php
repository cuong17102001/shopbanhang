@extends('admin.layouts.layout')
@section('content_admin')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Add Category</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        <form class="form-horizontal m-t-30" method="POST">
                            @csrf
                            @if (session('addsuccsess'))
                                <span style="color: green;">{{ session('email') }}</span>
                            @endif
                            <div class="form-group">
                                <label>Category <span class="help" style="color: red"> (*)</span></label><br>
                                @error('country')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <input type="text" name="addcategory" class="form-control" required="required" placeholder="Category">
                            </div>
                            <button class="btn btn-success" type="submit" name="submit">Add</button>

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
@endsection
