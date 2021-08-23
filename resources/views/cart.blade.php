@extends('layouts.main', $categories)
@section('title')
    Корзина - Big lion
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
                            <h2 class="breadcrumb-heading">Корзина</h2>
                            <ul>
                                <li>
                                    <a href="/">Главная /</a>
                                </li>
                                <li>Корзина</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                            @if(session('message'))

                                <h1>Успешно</h1>
                                <p>{{ session('message') }}</p>
                            <a href="/"> Вернуться на главную </a>
                            @elseif(isset($responceUrl))

                                @if($responceUrl->pg_status == "error")
                                <div class="alert alert-danger" role="alert">
                                    <h4>Ошибка!</h4>
                                </div>
                                    @elseif($responceUrl->pg_status == "rejected")
                                            <div class="alert alert-danger" role="alert">
                                                <h4>Отказ от платежа</h4>
                                            </div>
                                    @else
                                        <div class="alert alert-success" role="alert">
                                            <h4>Платёж успешно проведён!</h4>
                                            <p>Мы свяжемся с Вам в ближайшее время</p>
                                        </div>
                                    @endif

                            <a href="/"> Вернуться на главную </a>
                            @else
                                    @livewire('check-cart')

                            @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->
@endsection