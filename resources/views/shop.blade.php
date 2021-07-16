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
                                <li>Магазин</li>
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
                            <div class="widgets-area mb-5">
                                <h2 class="widgets-title mb-5">Цель</h2>
                                <div class="widgets-item">
                                    <ul class="widgets-category">
                                        @foreach($purposes as $purpose)
                                            @if($purposeCountFinal[$purpose->purpose] > 0)
                                                <li>
                                                    <a href="/shop/purpose/{{ $purpose->id }}">{{ $purpose->purpose }}
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
                                                    <a href="/shop/category/{{ $category->id }}">{{ $category->category }}
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
                                                    <a href="/shop/brand/{{ $brand->id }}">{{ $brand->brand }}
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
                                                    <a href="/shop/taste/{{ $taste->id }}">{{ $taste->taste }}
                                                        <span>({{ $tasteCountFinal[$taste->taste] }})</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @if(Route::current()->getName() != 'Shop.index')
                            <div class="widgets-area mb-5 text-center">
                                <a href="/Shop"><button type="button" class="btn btn-primary">Показать всё</button></a>
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
                              
                            </ul>
                        </div>

                        <div class="tab-content text-charcoal pt-8">

                                <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">

                                    <div class="product-grid-view row">
                                        @foreach($allProducts as $product)
                                        <div class="col-xl-4 col-sm-4 col-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="/singleProduct/{{ $product->id }}">
                                                        <img class="img-full" src="{{ asset('storage/'.$product->avatar)}}" alt="Product Images">
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
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                        </div>
                       @if($allProducts->total() > $allProducts->perPage())
                        <div class="pagination-area pt-10 pb-5">
                            <nav aria-label="Page navigation example">
                                {{ $allProducts->links() }}
                            </nav>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
