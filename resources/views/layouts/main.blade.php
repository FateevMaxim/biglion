<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Big Lion - @yield('title')</title>
    @yield('meta')
    <link rel="canonical" href="https://big-lion.kz/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Купить спортивное питание в Алматы, Казахстане с доставкой">
    <meta property="og:url" content="https://big-lion.kz/">
    <meta property="og:site_name" content="Интернет магазин спортивного питания Big-Lion">
    <meta name="robots" content="index, follow" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href={{asset('images/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('images/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="yandex-verification" content="4aeef78399199a94" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="{{asset('css/vendor/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/Pe-icon-7-stroke.css')}}" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="{{asset('css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins/ion.rangeSlider.min.css')}}" />

    @livewireStyles
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Style CSS -->
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BRJ37M4H34"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BRJ37M4H34');
    </script>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(83341663, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/83341663" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>


<body>
<div class="preloader-activate preloader-active open_tm_preloader">
    <div class="preloader-area-wrap">
        <div class="spinner d-flex justify-content-center align-items-center h-100">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<div class="main-wrapper">

    <!-- Begin Main Header Area -->
    <header class="main-header-area">
        <div class="header-top border-bottom d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="header-top-left">
                            <ul class="dropdown-wrap text-matterhorn">
                                <li>
                                    Позвонить
                                    <a href="tel://+77003033360">+7 700 303 3360</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-top-right text-matterhorn">
                            <i class="fa fa-chevron-right px-2"></i><p class="shipping mb-0"><a href="/delivery">Бесплатная доставка</a> от <span>15 000 тенге</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-sticky py-6 py-lg-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="header-middle-wrap position-relative">

                            <a href="/" class="header-logo">
                                <img src="{{asset("images/logo/dark.png")}}" alt="Header Logo">
                            </a>

                            <div class="main-menu d-none d-lg-block">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="drop-holder">
                                            <a href="/">Главная
                                            </a>
                                        </li>
                                        <li class="megamenu-holder">
                                            <a href="/Shop">Магазин</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="/testosterone">
                                                <span class="mm-text">Тестостерон</span>
                                            </a>
                                        </li>
                                        <?php
                                            if (isset(\Illuminate\Support\Facades\Auth::user()->user_type) AND \Illuminate\Support\Facades\Auth::user()->user_type == 'admin'){
                                                echo '<li class="drop-holder">
                                                        <a href="/Product/create">Добавить товар
                                                        </a>
                                                    </li>
                                                    <li class="drop-holder">
                                                        <a href="/testosterone/create">Добавить тестостерон
                                                        </a>
                                                    </li>';
                                            }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right">
                                <ul>
                                    {{--<li class="dropdown d-none d-lg-block">
                                        <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-label="setting" aria-expanded="false">
                                            <i class="pe-7s-user"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">
                                            <?php
                                            if (\Illuminate\Support\Facades\Auth::guest()){ ?>
                                                <li><a class="dropdown-item" href="/login">Войти</a><a class="dropdown-item" href="/register">Регистрация</a></li>
                                            <?php }
                                            if (\Illuminate\Support\Facades\Auth::check()){ ?>
                                                <li><a class="dropdown-item" href="my-account.html">Мой аккаунт</a></li>
                                            <li class="text-center"><span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span></li>
                                                <li>
                                                    <form action="/logout" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm m-auto">Выйти</button>
                                                    </form>
                                                </li>
                                               <?php }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                    </li>
                                    <li class="d-none d-lg-block">
                                        <a href="wishlist.html">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                    </li>--}}
                                    @livewire('cart-counter')
                                    <li class="mobile-menu_wrap d-block d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                            <i class="pe-7s-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu_wrapper" id="mobileMenu">
            <div class="offcanvas-body">
                <div class="inner-body">
                    <div class="offcanvas-top">
                        <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                    </div>
                    <div class="offcanvas-user-info text-center px-6 pb-5">
                        <div class=" text-silver">

                            <p class="shipping mb-0"><i class="fa fa-chevron-right px-2"></i><a href="/delivery" class="text-decoration-underline">Бесплатная доставка</a> от <span class="text-primary">15 000 тенге</span></p>
                        </div>
                       {{-- <ul class="dropdown-wrap justify-content-center text-silver">
                            <li class="dropdown dropup">
                                <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="pe-7s-users"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">



                                    <?php if (\Illuminate\Support\Facades\Auth::guest()){ ?>
                                    <li><a class="dropdown-item" href="/login">Войти</a><a class="dropdown-item" href="/register">Регистрация</a></li>
                                <?php }
                                    if (\Illuminate\Support\Facades\Auth::check()){ ?>
                                        <li><a class="dropdown-item" href="my-account.html">Мой аккаунт</a></li>
                                        <li class="text-center"><span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span></li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm m-auto">Выйти</button>
                                        </form>
                                    </li>
                                    <?php }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="wishlist.html">
                                    <i class="pe-7s-like"></i>
                                </a>
                            </li>
                        </ul>--}}
                    </div>
                    <div class="offcanvas-menu_area">
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children">
                                    <a href="/">
                                        <span class="mm-text">Главная</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/Shop">
                                        <span class="mm-text">Магазин</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/testosterone">
                                        <span class="mm-text">Тестостерон</span>
                                    </a>
                                </li>
                                <?php
                                if (isset(\Illuminate\Support\Facades\Auth::user()->user_type) AND \Illuminate\Support\Facades\Auth::user()->user_type == 'admin'){
                                    echo '<li class="drop-holder">
                                            <a href="/Product/create">Добавить товар
                                            </a>
                                        </li>
                                        <li class="drop-holder">
                                            <a href="/testosterone/create">Добавить тестостерон
                                            </a>
                                        </li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-search">
                            <span class="searchbox-info">Начните набирать и нажмите Enter для поиска, либо нажмите ESC</span>
                            <form action="#" class="hm-searchbox">
                                <input type="text" name="Введите название продукта..." value="Введите название продукта..." onblur="if(this.value==''){this.value='Введите название продукта...'}" onfocus="if(this.value=='Введите название продукта...'){this.value=''}">
                                <button class="search-btn" type="submit" aria-label="searchbtn"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-minicart_wrapper" id="miniCart">
                @livewire('show-in-cart')
        </div>
        <div class="global-overlay"></div>
    </header>
    
@yield('content')
    <!-- Begin Footer Area -->
    <div class="footer-area">
        <div class="footer-top section-space-y-axis-100 text-lavender" data-bg-image="{{asset('images/background-img/1-4-1920x419.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget-item">
                            <div class="footer-logo pb-4">
                                <a href="/">
                                    <img src="{{asset('images/logo/light.png')}}" alt="Logo">
                                </a>
                            </div>
                            <p class="short-desc mb-2">Интернет-магазин спортивного питания</p>
                            <div class="social-link pt-2">
                                <ul>
                                    <li>
                                        <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Tumblr" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-tumblr"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Instagram" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 pt-8 pt-lg-0">
                        <div class="widget-item">
                            <h3 class="widget-title mb-5">Продукты</h3>
                            <ul class="widget-list-item">
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <li>
                                            <i class="fa fa-chevron-right"></i>
                                            <a href="/shop/category/{{ $category->id }}">{{ $category->category }}</a>
                                        </li>
                                    @endforeach
                                @endisset
                                @isset($categoriesTestosterone)
                                    @foreach($categoriesTestosterone as $categoryTestosterone)
                                        <li>
                                            <i class="fa fa-chevron-right"></i>
                                            <a href="/shop/category/{{ $categoryTestosterone->id }}">{{ $categoryTestosterone->main_category }}</a>
                                        </li>
                                    @endforeach
                                @endisset
                                    @empty($categories)
                                        @empty($categoriesTestosterone)
                                        <li>
                                            <i class="fa fa-chevron-right"></i>
                                            <a href="/Shop">Магазин спортивного питания</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-chevron-right"></i>
                                            <a href="/testosterone">Тестостерон</a>
                                        </li>
                                    @endempty
                                   @endempty
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 pt-8 pt-lg-0">
                        <div class="widget-item">
                            <h3 class="widget-title mb-5">Нужна помощь?</h3>
                            <ul class="widget-list-item">
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="/offer">Публичная оферта</a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="/details">Реквизиты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 pt-8 pt-lg-0">
                        <div class="widget-item">
                            <h3 class="widget-title mb-5">Контактная информация</h3>
                        </div>
                        <div class="widget-contact-info pb-2">
                            <ul>
                                <li>
                                    Адрес : г.Алматы, ул. Гоголя, д.75
                                </li>
                                <li>
                                    <a href="mailto://manager@big-lion.kz">manager@big-lion.kz</a>
                                </li>
                                <li>
                                    <a href="tel://+77003033360">Телефон : +7 700 303 3360</a>
                                </li>
                            </ul>
                        </div>
                        <div class="payment-method">
                            <a href="#">
                                <img src="{{asset('images/payment/1.png')}}" alt="Payment Method">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-midnight-express py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                            <span class="copyright-text">© 2021 Big Lion All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End Here -->

    <!-- Begin Scroll To Top -->
    <a class="scroll-to-top" href="">
        <i class="fa fa-chevron-up"></i>
    </a>
<!-- Scroll To Top and Footer Area Ends Here -->

</div>

<!-- Global Vendor, plugins JS -->

<!-- JS Files
============================================ -->
<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->
<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}"></script>
@livewireScripts
<!--Plugins JS-->
<script src="{{asset('js/plugins/wow.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/plugins/parallax.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/plugins/tippy.min.js')}}"></script>
<script src="{{asset('js/plugins/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('js/plugins/mailchimp-ajax.js')}}"></script>

<!-- Minify Version -->
<!-- <script src="assets/js/vendor.min.js"></script> -->
<!-- <script src="assets/js/plugins.min.js"></script> -->

<!--Main JS (Common Activation Codes)-->
<script src="{{asset('js/main.js')}}"></script>
<!-- <script src="assets/js/main.min.js"></script> -->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+77003033360", // WhatsApp number
            call_to_action: "Чем мы можем Вам помочь?", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- /GetButton.io widget -->
@yield("customJs")

</body>

</html>