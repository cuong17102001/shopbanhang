@extends('front.layouts.app')

@section('content_front')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">My Product</h2>
            <!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $pro)

                                    <?php $image = json_decode($pro['image']); ?>

                                    <tr id="product{{ $pro->id }}">
                                        <th scope="row"><img width="50" height="75"
                                                src="{{ asset('upload/product/' . Auth::id() . '/' . $image[0]) }}"
                                                alt="">
                                        </th>
                                        <td>{{ $pro->name }}</td>
                                        <td>${{ $pro->price }}</td>
                                        <td> <a class="cart_quantity_delete"
                                                href="{{ URL::to('account/editproduct/' . $pro->id) }}"> <i
                                                    class="fa fa-edit"></i></a></td>
                                        <td><a class="cart_quantity_delete" onclick="delete_product({{ $pro->id }})"><i
                                                    class="fa fa-times"></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a class="btn btn-primary" id="" type="submit" href="{{ URL::to('account/addproduct') }}">Add
                            product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delete_product(id) {
            // alert(id);
            if (confirm('bạn có chắc muốn xóa?')) {
                $.ajax({
                    method: "POST",
                    url: "{{ URL::to('/delete-product') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id
                    },
                    success: function(response) {
                        console.log(response);
                        $('#product'+id).remove()
                    }

                });
            }
        }

    </script>
@endsection
