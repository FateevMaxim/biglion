@extends('layouts.main', $categories)
@section('title')
    Купить спортивное питание в Алматы, Казахстане с доставкой
@endsection
@section('meta')
    <meta name="description" content="Big Lion - продажа оригинального спортивного питания напрямую от производителей. Купить спортпит в Алматы и Казахстане с гарантией доставки. Самые низкие цены!">
    <meta property="og:title" content="Купить спортивное питание в Алматы, Казахстане с доставкой от Big Lion">
@endsection
@section('content')
    <!-- Begin Slider Area -->
    <div class="slider-area">

        <!-- Main Slider -->
        <div class="swiper-container main-slider-2 swiper-arrow with-bg_white">
            <div class="swiper-wrapper">
                        @foreach($sliders as $slider)
                            @php
                                $pieces = explode("|", $slider->pictures)
                            @endphp
                    <div class="swiper-slide animation-style-02 slide-style-2">
                        <div class="slide-inner bg-height py-6 py-lg-0" data-bg-image="{{ asset('images/slider/bg/2-1.jpg') }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center order-2 order-lg-1">
                                        <div class="slide-content text-white">
                                            <h2 class="title mb-4">{{ $slider->brandBond->brand }} {{ $slider->categoryName }}<br>{{ $slider->weight }}</h2>
                                            <p class="short-desc mb-10">{{ \Illuminate\Support\Str::limit(strip_tags($slider->description), 200) }} </p>
                                            <div class="button-wrap pb-2 pb-md-0">
                                                <a class="btn btn-custom-size lg-size btn-primary" href="/singleProduct/{{ $slider->id }}">Купить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                        <div class="inner-img">
                                            <div class="scene fill">
                                                <div class="expand-width text-center" data-depth="0.2">
                                                    <img src="{{ asset('/storage/'.$pieces[0]) }}" width="60%" alt="{{ $slider->categoryName }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination with-bg d-md-none"></div>

            <!-- Custom Arrows -->
            <div class="custom-arrow-wrap d-none d-md-block">
                <div class="custom-button-prev"></div>
                <div class="custom-button-next"></div>
            </div>
        </div>

    </div>
    <!-- Slider Area End Here -->

    <!-- Begin Product Area -->
    <div class="product-area section-space-top-100">
        <div class="container">
            <div class="section-title style-2 pb-55">
                <h2 class="title mb-0">Категории</h2>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="product-custom-col col-12">
                        <div class="product-category-item">
                            <a class="product-category-img img-zoom-effect" href="/shop/category/{{$category->id}}">
                                <img src="{{ asset('images/product/top-category/'.$category->category_img) }}" alt="{{ $category->category }}">
                            </a>
                            <div class="product-category-content pt-5">
                                <h2 class="title">
                                    <a href="/shop/category/{{$category->id}}">{{ $category->category }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

    <div class="banner-area banner-style-3 section-space-top-90">
        <div class="container">
            <div class="row">
                @php
                    $imgBanner = 1;
                @endphp
                @foreach($products as $product)
                    <div class="col-lg-6 pt-md-8 pt-lg-0">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img img-zoom-effect">
                                <img class="img-full" src="{{ asset('/images/banner/'.$imgBanner.'.jpg') }}" alt="{{ $product->categoryName }}">
                                <div class="inner-content text-white @if($imgBanner > 2) text-right text-night-rider @endif ">
                                    <h3 class="offer">{{ number_format($product->priceShop, 0, '', ' ') }} тенге</h3>
                                    <h2 class="title">{{ $product->brandBond->brand }}<br>{{ $product->categoryName }}</h2>
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="/singleProduct/{{ $product->id }}">Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $imgBanner++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

    <!-- Begin Shipping Area -->
    <div class="shipping-area section-space-top-100">
        <div class="container">
            <div class="shipping-bg" data-bg-image="{{ asset('images/shipping/bg/1-1-1280x202.jpg') }}">
                <div class="row shipping-wrap py-5 py-xl-0">
                    <div class="col-lg-4">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="{{ asset('images/shipping/icon/earphones.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title"><a href="/delivery" class="text-decoration-underline">Бесплатная доставка</a></h2>
                                <p class="short-desc mb-0">Предоставляется при покупке на сумму от 15 000 тенге</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-4 pt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="{{ asset('images/shipping/icon/plane.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title">Быстрая консультация</h2>
                                <p class="short-desc mb-0">Нащи специалисты помогут подобрать нужный продукт</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-4 pt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="{{ asset('images/shipping/icon/shield.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title">Защита оплаты</h2>
                                <p class="short-desc mb-0">Безопасность проведения оплаты гарантируется!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Area End Here -->
    {{--<div class="blog-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-md-center order-2 order-md-1 pt-5 pt-md-0">
                    <div class="banner-content text-center">
                        <!--<div class="inner-img mb-2">
                            <img src="{{ asset('') }}images/banner/inner-img/1-1-201x57.png" alt="Banner Image">
                        </div>-->
                        <h3 class="title text-charcoal">Уникальное предложение</h3>
                        <h4 class="sub-title text-primary mb-6">При заказе 3-х товаров скидка 50% на 4-ый!</h4>
                        <div class="countdown-wrap pb-8">
                            <div class="countdown item-4" data-countdown="2022/03/04" data-format="short">
                                <div class="countdown__item me-3">
                                    <span class="countdown__time daysLeft">22</span>
                                    <span class="countdown__text daysText">дня</span>
                                </div>
                                <div class="countdown__item me-3">
                                    <span class="countdown__time hoursLeft">13</span>
                                    <span class="countdown__text hoursText">часов</span>
                                </div>
                                <div class="countdown__item me-3">
                                    <span class="countdown__time minsLeft">08</span>
                                    <span class="countdown__text minsText">минут</span>
                                </div>
                                <div class="countdown__item">
                                    <span class="countdown__time secsLeft">40</span>
                                    <span class="countdown__text secsText">секунд</span>
                                </div>
                            </div>
                        </div>
                        <div class="button-wrap pb-8 pb-md-0">
                            <a class="btn btn-custom-size lg-size btn-primary" href="shop.html">Начать покупки</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="banner-img">
                        <img src="{{ asset('images/banner/2-1-407x529.png') }}" alt="Banner Image">
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- Begin Brand Area -->
    <div class="brand-area mb-5 mt-5">
        <div class="container">
            <div class="brand-nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container brand-slider-2">
                            <div class="swiper-wrapper">
                                @foreach($brands as $brand)
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="/shop/brand/{{ $brand->id }}">
                                            <img src="{{ asset('images/brand/'.$brand->brand_img) }}" alt="{{ $brand->brand }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area End Here -->
@endsection
