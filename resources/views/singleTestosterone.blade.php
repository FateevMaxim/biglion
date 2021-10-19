@extends('layouts.main', $categoriesTestosterone)
@section('title')
    Купить {{ $exactProduct[0]->productName }}
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
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('images/breadcrumb/bg/1-1-1920x400-t.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item text-white">
                            <h2 class="breadcrumb-heading">Стероиды</h2>
                            <ul>
                                <li>
                                    <a href="/">Главная /</a>
                                </li>
                                <li><a href="/testosterone">Тестостерон /</a></li>
                                <li><a href="/subCategoryTestosterone/{{ $exactProduct[0]->subCategory }}">{{ $exactProduct[0]->subCategoryBond->sub_category }} /</a></li>
                                <li>{{ $exactProduct[0]->productName }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-product-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-product-img">
                            <div class="swiper-container single-product-slider">
                                <div class="swiper-wrapper">
                                    @php
                                        $pieces = explode("|", $exactProduct[0]->pictures)
                                    @endphp
                                    @foreach($pieces as $piece)
                                        <div class="swiper-slide" style="text-align: center;">
                                            <a href="{{ asset('storage/'.$piece)}}" class="single-img gallery-popup">
                                                <img class="img-full" src="{{ asset('storage/'.$piece)}}" alt="{{ $exactProduct[0]->productName }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="thumbs-arrow-holder">
                                <div class="swiper-container single-product-thumbs">
                                    <div class="swiper-wrapper">
                                        @foreach($pieces as $pieceThumb)
                                            <a href="#" class="swiper-slide" style="text-align: center;">
                                                <img class="img-full" src="{{ asset('storage/'.$pieceThumb)}}" alt="{{ $exactProduct[0]->productName }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class=" thumbs-button-wrap d-none d-md-block">
                                    <div class="thumbs-button-prev">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                    <div class="thumbs-button-next">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-9 pt-lg-0">
                        <div class="single-product-content">
                            <h2 class="title mb-3">{{ $exactProduct[0]->mainCategoryBond->main_category }} {{ $exactProduct[0]->testosteroneBrandBond->brand }} {{ $exactProduct[0]->productName }} {{ $exactProduct[0]->weight }}</h2>
                            <div class="price-box pb-3">
                                <span class="new-price text-danger">₸{{ number_format($exactProduct[0]->priceShop, 0, '', ' ') }}</span>     <img src="{{ asset('images/kaspi-red12.jpg')}}" style="width:100px; height: auto;">
                            </div>
                            @livewire('testosterone-table', ['product_id' => $exactProduct[0]->id, 'product_slug' =>$exactProduct[0]->slug, 'productName' =>$exactProduct[0]->productName ])
                            <div>
                                <a href="https://wa.me/77003033360?text=Я хочу проконсультироваться по поводу {{ $exactProduct[0]->mainCategoryBond->main_category }} {{ $exactProduct[0]->testosteroneBrandBond->brand }} {{ $exactProduct[0]->productName }} {{ $exactProduct[0]->weight }}
                                        "><button class="btn btn-primary" type="button">Бесплатная консультация со специалистом </button><img src="{{ asset('images/product/icon/whatsapp.png') }}" width="48" alt="What's app"></a>
                            </div>
                            {{--<ul class="quantity-with-btn pb-9">
                                <li class="quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                    </div>
                                </li>
                                <li class="add-to-cart">
                                    <a class="btn btn-custom-size lg-size btn-primary" href="#">В корзину</a>
                                </li>
                                <li class="wishlist-btn-wrap">
                                    <a class="custom-circle-btn" href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>--}}
                            <div class="product-category pb-3">
                                <span class="title">Категория :</span>
                                <ul>
                                    <li>
                                        <a href="/shop/categoryTestosterone/{{ $exactProduct[0]->mainCategory }}">{{ $exactProduct[0]->mainCategoryBond->main_category }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-category pb-3">
                                <span class="title">Подкатегория :</span>
                                <ul>
                                    <li>
                                        <a href="/shop/subCategoryTestosterone/{{ $exactProduct[0]->subCategory }}">{{ $exactProduct[0]->subCategoryBond->sub_category }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-category social-link align-items-center pb-lg-8">
                                <span class="title pe-3">Поделиться:</span>
                                <ul>
                                    <li>
                                        <a href="#" data-tippy="What's App" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Telegram" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav product-tab-nav mb-10" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active tab-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                                    Описание
                                </a>
                            </li>
                            {{--<li class="nav-item" role="presentation">
                                <a class="tab-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
                                    Отзывы(3)
                                </a>
                            </li>--}}
                        </ul>
                        <div class="tab-content product-tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="product-description-body">
                                    {!! $exactProduct[0]->description !!}
                                </div>
                            </div>
                            {{--<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-review-body">
                                    <div class="blog-comment">
                                        <h4 class="heading mb-7">3 Комментария</h4>
                                        <div class="blog-comment-item mb-8">
                                            <div class="blog-comment-img">
                                                <img src="assets/images/blog/avatar/3-1-101x101.png" alt="User Image">
                                            </div>
                                            <div class="blog-comment-content pb-8">
                                                <div class="user-meta">
                                                    <span><strong>Тестовый пользователь -</strong> 21 июля 2021 12:00:07</span>
                                                </div>
                                                <p class="user-comment mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci labore et dol magna aliqua. Ut enim ad minim veniam quis nostrud</p>
                                                <a class="btn btn-custom-size comment-btn" href="#">Ответить</a>
                                            </div>
                                        </div>
                                        <div class="blog-comment-item relpy-item mb-8">
                                            <div class="blog-comment-img">
                                                <img src="assets/images/blog/avatar/3-2-101x101.png" alt="User Image">
                                            </div>
                                            <div class="blog-comment-content pb-8">
                                                <div class="user-meta">
                                                    <span><strong>Тестовый пользователь 2 -</strong> 22 июля 2021 18:00:17</span>
                                                </div>
                                                <p class="user-comment mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci labore et dol magna aliqua. Ut enim ad minim veniam quis nostrud</p>
                                                <a class="btn btn-custom-size comment-btn" href="#">Ответить</a>
                                            </div>
                                        </div>
                                        <div class="blog-comment-item">
                                            <div class="blog-comment-img">
                                                <img src="assets/images/blog/avatar/3-3-101x101.png" alt="User Image">
                                            </div>
                                            <div class="blog-comment-content">
                                                <div class="user-meta">
                                                    <span><strong>Тестовый пользователь 3 -</strong> 20 июля 2021 10:15:04</span>
                                                </div>
                                                <p class="user-comment mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci labore et dol magna aliqua. Ut enim ad minim veniam quis nostrud</p>
                                                <a class="btn btn-custom-size comment-btn" href="#">Ответить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feedback-area pt-10">
                                        <h2 class="heading mb-3">Добавить отзыв</h2>
                                        <p class="short-desc mb-3">Ваш email адрес не будет отображаться</p>
                                        <form class="feedback-form pt-8" action="#">
                                            <div class="group-input">
                                                <div class="form-field me-md-6 mb-6 mb-md-0">
                                                    <input type="text" name="name" placeholder="Ваше имя*" class="input-field">
                                                </div>
                                                <div class="form-field me-md-6 mb-6 mb-md-0">
                                                    <input type="text" name="email" placeholder="Ваш Email*" class="input-field">
                                                </div>
                                                <div class="form-field">
                                                    <input type="text" name="number" placeholder="Номер телефона" class="input-field">
                                                </div>
                                            </div>
                                            <div class="form-field mt-6">
                                                <textarea name="message" placeholder="Сообщения" class="textarea-field"></textarea>
                                            </div>
                                            <div class="button-wrap mt-8">
                                                <button type="submit" value="submit" class="btn btn-custom-size lg-size btn-primary" name="submit">Отправить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="background-img" data-bg-image="assets/images/background-img/1-2-1920x716.jpg">
            <div class="product-area product-arrow section-space-y-axis-100">
                <div class="container">
                    <div class="section-title pb-55">
                        <h2 class="title mb-0">Похожие товары</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-container product-slider">
                                <div class="swiper-wrapper text-heading">
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="shop.html">
                                                    <img class="img-full" src="assets/images/product/medium-size/product-slider/1-1-290x350.jpg" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name pb-1" href="shop.html">BSN True Mass 1200, 4.65 кг.</a>
                                                <div class="price-box">
                                                    <div class="price-box-holder">
                                                        <span>Цена:</span>
                                                        <span class="new-price text-primary">₸29 000</span>
                                                    </div>
                                                </div>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Быстрый просмотр" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Сохранить на будущее" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="compare.html" data-tippy="Добавить в сравнение" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="shop.html">
                                                    <img class="img-full" src="assets/images/product/medium-size/product-slider/1-2-290x350.jpg" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name pb-1" href="shop.html">Ultimate Creatine 1000 гр.</a>
                                                <div class="price-box">
                                                    <div class="price-box-holder">
                                                        <span>Цена:</span>
                                                        <span class="new-price text-primary">₸19 000</span>
                                                    </div>
                                                </div>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Быстрый просмотр" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Сохранить на будущее" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="compare.html" data-tippy="Добавить в сравнение" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="shop.html">
                                                    <img class="img-full" src="assets/images/product/medium-size/product-slider/1-3-290x350.jpg" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name pb-1" href="shop.html">Animal Flex, 44 пак.</a>
                                                <div class="price-box">
                                                    <div class="price-box-holder">
                                                        <span>Цена:</span>
                                                        <span class="new-price text-primary">₸25 000</span>
                                                    </div>
                                                </div>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Быстрый просмотр" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Сохранить на будущее" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="compare.html" data-tippy="Добавить в сравнение" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="shop.html">
                                                    <img class="img-full" src="assets/images/product/medium-size/product-slider/1-4-290x350.jpg" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name pb-1" href="shop.html">Carnitine 500 мг, 60 таб.</a>
                                                <div class="price-box">
                                                    <div class="price-box-holder">
                                                        <span>Цена:</span>
                                                        <span class="new-price text-primary">₸23 000</span>
                                                    </div>
                                                </div>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Быстрый просмотр" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Сохранить на будущее" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="compare.html" data-tippy="Добавить в сравнение" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="product-button-wrap pt-10">
                                <div class="product-button-prev">
                                    <i class="pe-7s-angle-left"></i>
                                </div>
                                <div class="product-button-next">
                                    <i class="pe-7s-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </main>
@endsection