@extends('layouts.main', $categories)
@section('title')
    Оплата - Big lion
@endsection
@section('meta')
    <meta name="description" content="Купить спортивное питание от  Big Lion! У нас самая низкая цена, доставка по Алматы и всему Казахстану. Только качественные препараты напрямую от производителей.">
    <meta property="og:title" content="Купить спортивное питание от Big Lion, лучшая цена в Алматы, Казахстане!">
@endsection
@section('style')
    <link rel="preload" href="{{asset('css/style.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{asset('css/style.css')}}"></noscript>
@endsection
@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('images/breadcrumb/bg/1-1-1920x400.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item text-white">
                            <h2 class="breadcrumb-heading">Страница оплаты</h2>
                            <ul>
                                <li>
                                    <a href="/">Главная /</a>
                                </li>
                                <li>Оплата</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-area section-space-y-axis-100">
            <div class="container">
                {{--<div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text mb-1">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                        sit amet ipsum luctus.</p>
                                    <form action="javascript:void(0)">
                                        <p class="form-row-first">
                                            <label class="mb-1">Username or email <span class="required">*</span></label>
                                            <input type="text">
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password <span class="required">*</span></label>
                                            <input type="text">
                                        </p>
                                        <p class="form-row">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Remember me</label>
                                        </p>
                                        <p class="lost-password"><a href="#">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="javascript:void(0)">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}

                    <form action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="row">
                    <div class="col-lg-6 col-12">
                            <div class="checkbox-form">
                                <h3>Детали оплаты</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Город</label>
                                            <select class="myniceselect nice-select wide" name="city">
                                                <option value="Almaty" data-display="Almaty">Алматы</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Имя <span class="required">*</span></label>
                                            <input placeholder="Как Вас зовут?" name="name" required type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Телефон <span class="required">*</span></label>
                                            <input type="text" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Адрес <span class="required">*</span></label>
                                            <input placeholder="Улица" name="street" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <input placeholder="Квартира, подьезд, блок..." name="apartment" type="text" required>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-12">
                                        <div class="checkout-form-list create-acc">
                                            <input id="cbox" type="checkbox">
                                            <label for="cbox">Create an account?</label>
                                        </div>
                                        <div id="cbox-info" class="checkout-form-list create-account">
                                            <p>Create an account by entering the information below. If you are a returning
                                                customer please login at the top of the page.</p>
                                            <label>Account password <span class="required">*</span></label>
                                            <input placeholder="password" type="password">
                                        </div>
                                    </div>--}}
                                </div>
                                <div class="different-address">
                                    {{--<div class="ship-different-title">
                                        <h3>
                                            <label>Ship to a different address?</label>
                                            <input id="ship-box" type="checkbox">
                                        </h3>
                                    </div>--}}
                                    {{--<div id="ship-box-info" class="row">
                                        <div class="col-md-12">
                                            <div class="myniceselect country-select clearfix">
                                                <label>Country <span class="required">*</span></label>
                                                <select class="myniceselect nice-select wide">
                                                    <option data-display="Bangladesh">Bangladesh</option>
                                                    <option value="uk">London</option>
                                                    <option value="rou">Romania</option>
                                                    <option value="fr">French</option>
                                                    <option value="de">Germany</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Company Name</label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input placeholder="Street address" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Postcode / Zip <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input placeholder="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="order-notes">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Дополнительная информация</label>
                                            <textarea cols="30" rows="10" name="notes" placeholder="Информация по доставке, пожелания и пр."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Ваш заказ</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Товар</th>
                                        <th class="cart-product-total">Всего</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $cartProduct)
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $cartProduct->options->slug }} ({{ $cartProduct->options->taste }})<strong class="product-quantity">
                                                    × {{ $cartProduct->qty }}</strong></td>
                                            <td class="cart-product-total"><span class="amount">{{ $cartProduct->price * $cartProduct->qty }} тенге</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="order-total">
                                        <th>Общая сумма</th>
                                        <td><strong><span class="amount">{{ $cartTotal }} тенге</span></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        {{--<div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title">
                                                    <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                        Direct Bank Transfer.
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order
                                                        ID as the payment
                                                        reference. Your order won’t be shipped until the funds have cleared in
                                                        our account.</p>
                                                </div>
                                            </div>
                                        </div>--}}
                                        <h4 class="mb-3">Метод оплаты</h4>
                                        <div class="d-block my-3">
                                            @php
                                                foreach ($cart as $ca){
                                                $cartColArr[] = $ca->options->marker;
                                                }
                                            $cartCol = collect($cartColArr);
                                            @endphp
                                            {{--@if(!$cartCol->contains('testosterone'))
                                            <div class="custom-control">
                                                <input id="credit" name="paymentMethod[]" type="radio" value="1" class="custom-control-input" checked="" required="">
                                                <label class="custom-control-label" for="credit">Оплата картой</label>
                                            </div>
                                            @endif --}}
                                            <div class="custom-control">
                                                <input id="deliveryGuy" name="paymentMethod[]" type="radio" value="2" class="custom-control-input" required="">
                                                <label class="custom-control-label" for="deliveryGuy">Оплата курьеру</label>
                                            </div>
                                        </div>
                                        {{--<div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title">
                                                    <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                        Оплата курьеру
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Оплатить курьеру наличными или Kaspi переводом при получении товара</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title">
                                                    <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                        Оплата картой
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Оплатить при помощи карты VISA/MasterCard</p>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Оплатить" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </form>


            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->
@endsection
