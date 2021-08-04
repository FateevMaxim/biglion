@extends('layouts.main', $categories)
@section('title')
    Купить спортивное питание от Big Lion, лучшая цена в Алматы, Казахстане!
@endsection
@section('meta')
    <meta name="description" content="Купить спортивное питание от  Big Lion! У нас самая низкая цена, доставка по Алматы и всему Казахстану. Только качественные препараты напрямую от производителей.">
    <meta property="og:title" content="Купить спортивное питание от Big Lion, лучшая цена в Алматы, Казахстане!">
@endsection
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
                                <li><a href="/Shop">Магазин</a></li>
                                @if(Request::is('shop/category/*')) <li>/ <a href="/shop/category/">{{$allProducts[0]->categoryBond->category}}</a></li> @endif
                                @if(Request::is('shop/purpose/*')) <li>/ <a href="/shop/purpose/">{{$allProducts[0]->purposeBond->purpose}}</a></li> @endif
                                @if(Request::is('shop/brand/*')) <li>/ <a href="/shop/brand/">{{$allProducts[0]->brandBond->brand}}</a></li> @endif
                                @if(Request::is('shop/taste/*')) <li>/ <a href="/shop/taste/">{{$allProducts[0]->tasteBond->taste}}</a></li> @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-lg-1 order-2s pt-10 pt-lg-0">
                        <div class="sidebar-area style-2">
                            {{--<div class="widgets-searchbox widgets-area py-6 mb-5">
                                <form id="widgets-searchbox" action="#">
                                    <input class="input-field" type="text" placeholder="Поиск">
                                    <button class="widgets-searchbox-btn" type="submit">
                                        <i class="pe-7s-search"></i>
                                    </button>
                                </form>
                            </div>--}}
                            <div class="widgets-area mb-5">
                                <h2 class="widgets-title mb-5">Цель</h2>
                                <div class="widgets-item">
                                    <ul class="widgets-category">
                                        @foreach($purposes as $purpose)
                                            @if($purposeCountFinal[$purpose->purpose] > 0)
                                                <li>
                                                    <a @if("shop/purpose/".$purpose->id == Request::path()) class="text-primary new-price"  @endif href="/shop/purpose/{{ $purpose->id }}">{{ $purpose->purpose }}
                                                        <span>({{ $purposeCountFinal[$purpose->purpose] }})</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widgets-area mb-5">
                                <h2 class="widgets-title mb-5">Категории</h2>
                                <div class="widgets-item">
                                    <ul class="widgets-category">
                                        @foreach($categories as $category)
                                            @if($categoryCountFinal[$category->category] > 0)
                                                <li>
                                                    <a @if("shop/category/".$category->id == Request::path()) class="text-primary new-price"  @endif href="/shop/category/{{ $category->id }}">{{ $category->category }}
                                                        <span>({{ $categoryCountFinal[$category->category] }})</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widgets-area mb-5">
                                <h2 class="widgets-title mb-5">Бренды</h2>
                                <div class="widgets-item">
                                    <ul class="widgets-category">
                                        @foreach($brands as $brand)
                                            @if($brandCountFinal[$brand->brand] > 0)
                                                <li>
                                                    <a @if("shop/brand/".$brand->id == Request::path()) class="text-primary new-price"  @endif href="/shop/brand/{{ $brand->id }}">{{ $brand->brand }}
                                                        <span>({{ $brandCountFinal[$brand->brand] }})</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            @if(isset($tastes))
                                <div class="widgets-area mb-5">
                                    <h2 class="widgets-title mb-5">Вкус</h2>
                                    <div class="widgets-item">
                                        <ul class="widgets-category">
                                            @foreach($tastes as $taste)
                                                @if($tasteCountFinal[$taste->taste] > '0')
                                                    <li>
                                                        <a @if("shop/taste/".$taste->id == Request::path()) class="text-primary new-price"  @endif href="/shop/taste/{{ $taste->id }}">{{ $taste->taste }}
                                                            <span>({{ $tasteCountFinal[$taste->taste] }})</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if(Route::current()->getName() != 'Shop')
                                <div class="widgets-area mb-5 text-center">
                                    <a href="{{ route('Shop') }}"><button type="button" class="btn btn-primary">Показать всё</button></a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                        <div class="product-topbar">
                            <ul>
                                <li class="page-count">
                                    Товары с <span> {{ $allProducts->firstItem() }}</span> по <span>{{ $allProducts->lastItem() }}</span> из <span>{{ $allProducts->total() }}</span>
                                </li>
                                <li class="product-view-wrap">
                                    <ul class="nav" role="tablist">
                                        <li class="grid-view" role="presentation">
                                            <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                                <i class="fa fa-th"></i>
                                            </a>
                                        </li>
                                        <li class="list-view" role="presentation">
                                            <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                                <i class="fa fa-th-list"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <li class="short">
                                     @php
                                         $page = Request::get('orderBy');
                                     @endphp
                                     <select class="nice-select rounded-0">
                                         <option value="default" @if($page == 'default') selected @endif>По умолчанию</option>
                                         {{--<option value="2">По популярности</option>--}}
                                         <option value="name-a-z" @if($page == 'name-a-z') selected @endif>По названию: А-Я</option>
                                         <option value="name-z-a" @if($page == 'name-z-a') selected @endif>По названию: Я-А</option>
                                         <option value="price-low-high" @if($page == 'price-low-high') selected @endif>Сначала дешевле</option>
                                         <option value="price-high-low" @if($page == 'price-high-low') selected @endif>Сначала дороже</option>
                                     </select>
                                 </li>
                            </ul>
                        </div>
                        <div class="wholeShop pb-5">
                        <div class="tab-content text-charcoal pt-8">
                            <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                                <div class="product-grid-view row">
                                    @foreach($allProducts as $product)

                                        <div class="col-xl-4 col-sm-4 col-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="/singleProduct/{{ $product->id }}">
                                                        <img class="img-full" src="{{ asset('storage/'.$product->avatar)}}" alt="{{ $product->categoryName }}">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="/singleProduct/{{ $product->id }}">{{ $product->brandBond->brand }} {{ $product->categoryName }} {{ $product->weight }}</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Цена:</span>
                                                            <span class="new-price text-primary">₸{{ number_format($product->priceShop, 0, '', ' ') }}</span>
                                                        </div>
                                                    </div>
                                                    @livewire('show-shop', ['product_slug' => $product->slug])
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">

                                <div class="product-list-view row">
                                    @foreach($allProducts as $product)
                                        <div class="col-12">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect m-2">
                                                    <a href="/singleProduct/{{ $product->id }}">
                                                        <img class="img-full" src="{{ asset('storage/'.$product->avatar)}}" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="/singleProduct/{{ $product->id }}">{{ $product->brandBond->brand }} {{ $product->categoryName }} {{ $product->weight }}</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">₸{{ number_format($product->priceShop, 0, '', ' ') }}</span>
                                                    </div>
                                                    <p class="short-desc mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($product->description), 300) }} </p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            {{--<li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Быстрый просмотр" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Сохранить на будущее" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                        @if($allProducts->total() > $allProducts->perPage())
                            <div class="pagination-area pt-10">
                                <nav aria-label="Page navigation example">
                                    {{ $allProducts->withQueryString()->links() }}
                                </nav>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $('.nice-select').change(function() {
                let orderBy = $(this).val();

                $.ajax({
                    url: "{{ url(Request::path()) }}",
                    type: "GET",
                    data: {
                        orderBy: orderBy
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters,location.pathname.length);
                        let newURL = url + '?';
                        newURL += 'orderBy=' + orderBy;
                        history.pushState({}, '', newURL);
                        $('.wholeShop').html(data)
                    }
                });
            })
        })
    </script>

@endsection