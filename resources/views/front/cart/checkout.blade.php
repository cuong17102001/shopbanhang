@extends('front.layouts.app')

@section('content_front')
    <style>
        .hide {
            display: none;
        }

    </style>
    <div class="col-sm-9 padding-right">
        <section id="cart_items">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="checkout-options">

                <ul class="nav">
                    <li class="hide" id="regis_form">
                        <div class="shopper-informations">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="shopper-info">
                                        <p>Register</p>
                                        <form>
                                            <input id="name_regis" type="text" name="name" placeholder="Name">
                                            <input id="email_regis" type="text" name="email" placeholder="Email">
                                            <input id="password_regis" type="password" name="password"
                                                placeholder="Password">
                                            <input id="repassword_regis" type="password" name="repassword"
                                                placeholder="Password">
                                        </form>
                                        <label class="btn btn-primary" onclick="register()">Register</label><br>
                                        If you already have an account, please <a onclick="show_login()">login here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @if (Auth::check() == false)
                    <li class="" id="login_form">
                        <div class="shopper-informations">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="shopper-info">
                                        <p>Login</p>
                                        <form>
                                            <input id="email_login" name="email" type="text" placeholder="Email">
                                            <input id="password_login" name="password" type="password"
                                                placeholder="Password">

                                        </form>
                                        <label class="btn btn-primary" onclick="login()">Login</label><br>
                                        If you do not have an account, please <a onclick="show_regis()">register here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                    @endif
                </ul>
            </div>
            <!--/checkout-options-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div>
            <!--/register-req-->
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>

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
                                        <a><img src="{{ asset('upload/product/' . $item['userId'] . '/' . 'image_85_' . $image[0]) }}"
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
                                            <input id="qty{{ $item['id'] }}" class="cart_quantity_input" type="text"
                                                name="quantity" value="{{ $item['qty'] }}" autocomplete="off" size="2">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">$<span
                                                id="total_price{{ $item['id'] }}">{{ $item['price'] * $item['qty'] }}</span>
                                        </p>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <span style="color: green; font-size: 20px">{!! session()->get('succsess') !!}</span>
                            <span style="color: red; font-size: 20px">{!! session()->get('error') !!}</span>
                            <form method="POST"  action="{{URL::to('/pay')}}">
                                @csrf
                                <input type="text" placeholder="User Name">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Address">
                                <input name="price" type="hidden" value="{{$sum}}">
                                <button class="btn btn-primary" type="submit">Pay</button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                                <td colspan="2">
                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td>Cart Sub Total</td>
                                            <td>$59</td>
                                        </tr>
                                        <tr>
                                            <td>Exo Tax</td>
                                            <td>$2</td>
                                        </tr>
                                        <tr class="shipping-cost">
                                            <td>Shipping Cost</td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>$<span id="total">{{ $sum }}</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <label><input type="checkbox"> Shipping to bill address</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>


            <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
        </section>
        <!--/#cart_items-->

    </div>
    <script>
        function checkEmail(email) {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {

                email.focus;
                return false;
            } else {
                // alert('OK roi day, Email nay hop le.');
                return true
            }
        }

        function show_regis() {
            $('#login_form').addClass('hide')
            $('#regis_form').removeClass('hide')
        }

        function show_login() {
            $('#regis_form').addClass('hide')
            $('#login_form').removeClass('hide')
        }

        function login() {
            var email = $('#email_login').val();
            var password = $('#password_login').val();

            $.ajax({
                method: "POST",
                url: "{{ URL::to('/login-ajax') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': email,
                    'password': password

                },
                success: function(response) {
                    console.log(response);
                    if (response == 1) {
                        alert('bạn đã đăng nhập thành công!')
                        location.reload()
                    } else {
                        alert('sai email hoặc mật khẩu')
                    }

                }
            });
        }

        function register() {
            var name = $('#name_regis').val();
            var email = $('#email_regis').val();
            var password = $('#password_regis').val();
            var repassword = $('#repassword_regis').val();

            if (name != '' && email != '' && password != '' && repassword != '') {
                if (checkEmail(email) == true) {
                    // alert('OK roi day, Email nay hop le.');

                    if (password == repassword) {
                        $.ajax({
                            method: "POST",
                            url: "{{ URL::to('/register-ajax') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'name': name,
                                'email': email,
                                'password': password,

                            },
                            success: function(response) {
                                console.log(response);
                                if (response == 0) {
                                    alert('email đã tồn tại')
                                } else {
                                    alert('bạn đã đăng kí thành công')
                                    $('#regis_form').addClass('hide')
                                    $('#login_form').removeClass('hide')
                                }
                            }
                        });
                        // alert('ok')
                    } else {
                        alert('nhập lại mật khẩu không đúng!')
                    }
                } else {
                    alert('Hay nhap dia chi email hop le.\nExample@gmail.com');
                }
            } else {
                alert('nhập đầy đủ thông tin')
            }


        }

    </script>
@endsection
