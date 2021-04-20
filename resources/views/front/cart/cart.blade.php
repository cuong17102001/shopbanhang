@extends('front.layouts.app')

@section('content_front')
    <div class="col-sm-9 padding-right">
        <section id="cart_items">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum = 0; ?>
                        @if (Session::has('cart'))
                            <?php
                            $cart = Session::get('cart');
                            
                            ?>
                            @foreach ($cart as $item)
                                <?php
                                $image = json_decode($item['image']);
                                $sum += $item['price'] * $item['qty'];
                                ?>
                                <tr id="cart{{ $item['id'] }}">
                                    <td class="cart_product">
                                        <a href=""><img
                                                src="{{ asset('upload/product/' . $item['userId'] . '/' . 'image_85_' . $image[0]) }}"
                                                alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $item['name'] }}</a></h4>
                                        <p>Web ID: {{ $item['id'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>$<span id="price{{ $item['id'] }}">{{ $item['price'] }}</span></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_down" onclick="down_qty({{ $item['id'] }})"> - </a>
                                            <input id="qty{{ $item['id'] }}" class="cart_quantity_input" type="text"
                                                name="quantity" value="{{ $item['qty'] }}" autocomplete="off" size="2">
                                            <a class="cart_quantity_up" onclick="up_qty({{ $item['id'] }})"> + </a>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">$<span
                                                id="total_price{{ $item['id'] }}">{{ $item['price'] * $item['qty'] }}</span>
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" onclick="delete_cart({{ $item['id'] }})"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
        <!--/#cart_items-->
        <section id="do_action">

            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total $<span id="total">{{$sum}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </section>
        <!--/#do_action-->
    </div>
    <script>
        function down_qty(id) {
            var qty = $('#qty' + id).val();
            var header = $('#cart_header').text();
            var total_price = $('#total_price' + id).text();
            var price = $('#price' + id).text()
            var total = parseInt($('#total').text())
            // alert(qty)
            $.ajax({
                method: "POST",
                url: "{{ URL::to('/down-qty') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                    $('#total').text(total - price)
                    if (qty - 1 <= 0) {
                        $('#cart' + id).remove();
                        $('#cart_header').text(header - 1);
                    } else {
                        $('#qty' + id).val(qty - 1)
                        $('#total_price' + id).text(total_price - price)

                    }
                }
            });
        }

        function up_qty(id) {

            var qty = parseInt($('#qty' + id).val());
            var total_price = parseInt($('#total_price' + id).text());
            var price = parseInt($('#price' + id).text())
            var total = parseInt($('#total').text())
            $.ajax({
                method: "POST",
                url: "{{ URL::to('/up-qty') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                    $('#qty' + id).val(qty + 1)
                    $('#total_price' + id).text(total_price + price)
                    $('#total').text(total + price)
                }
            });
        }

        function delete_cart(id) {
            // alert(id)
            var total_price = parseInt($('#total_price' + id).text());
            var total = parseInt($('#total').text())
            var header = $('#cart_header').text();
            if (confirm('Bạn có muốn xóa khỏi giỏ hàng')) {
                $.ajax({
                    method: "POST",
                    url: "{{ URL::to('/delete-cart') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id
                    },
                    success: function(response) {
                        console.log(response);
                        $('#cart_header').text(header - 1);
                        $('#total').text(total - total_price)
                        $('#cart' + id).remove();
                    }
                });
            }
        }

    </script>
@endsection
