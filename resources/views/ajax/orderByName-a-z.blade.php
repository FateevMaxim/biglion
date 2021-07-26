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
                            {{--<div class="product-add-action">
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
                                </ul>
                            </div>--}}
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
                            {{--<div class="product-add-action">
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
                                </ul>
                            </div>--}}
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
            {{ $allProducts->appends(['orderBy' => 'name-a-z'])->links() }}
        </nav>
    </div>
@endif