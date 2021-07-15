@extends('layouts.main', $categories)

@section('content')
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('images/breadcrumb/bg/1-1-1920x400.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item text-white">
                            <h2 class="breadcrumb-heading">Спортивное питание</h2>
                            <ul>
                                <li>
                                    <a href="/">Главная /</a>
                                </li>
                                <li><a href="/Shop">Магазин /</a></li>
                                <li>{{ $exactProduct[0]->categoryName }}</li>
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
                                                <img class="img-full" src="{{ asset('storage/'.$piece)}}" alt="{{ $exactProduct[0]->categoryName }}">
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
                                            <img class="img-full" src="{{ asset('storage/'.$pieceThumb)}}" alt="{{ $exactProduct[0]->categoryName }}">
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
                            <h2 class="title mb-3">{{ $exactProduct[0]->categoryBond->category }} {{ $exactProduct[0]->brandBond->brand }} {{ $exactProduct[0]->categoryName }} {{ $exactProduct[0]->weight }}</h2>
                            <div class="price-box pb-3">
                                <span class="new-price text-danger">₸{{ $exactProduct[0]->priceShop }}</span>
                            </div>
                            <div class="selector-wrap color-option pb-55">
                                <span class="selector-title">Вкус</span>
                                <select class="nice-select wide rounded-0">

                                    @foreach($customTasteProduct as $taste)
                                    <option value="{{$taste->taste}}">{{$taste->tasteBond->taste}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="product-category pb-3">
                                <span class="title">Категория :</span>
                                <ul>
                                    <li>
                                        <a href="/shop/category/{{ $exactProduct[0]->categoryNutrition }}">{{ $exactProduct[0]->categoryBond->category }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-category product-tags pb-3">
                                <span class="title">Цель :</span>
                                <ul>
                                    <li>
                                        <a href="/shop/purpose/{{ $exactProduct[0]->purpose }}">{{ $exactProduct[0]->purposeBond->purpose }}</a>
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
                          
                        </ul>
                        <div class="tab-content product-tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="product-description-body">
                                    {!! $exactProduct[0]->description !!}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </main>
@endsection
