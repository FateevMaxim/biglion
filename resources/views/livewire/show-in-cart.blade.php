<div class="offcanvas-body">
    <div class="minicart-content">
        <div class="minicart-heading">
            <h4 class="mb-0">Список покупок</h4>
            <a href="" class="button-close"><i class="pe-7s-close" data-tippy="Закрыть" data-tippy-inertia="true"
                                               data-tippy-animation="shift-away" data-tippy-delay="50"
                                               data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
        </div>
        <ul class="minicart-list">
            @foreach($cart as $ca)
                <li class="minicart-product">
                    <a wire:click="removeCart({{ json_encode($ca->rowId) }})" class="product-item_remove"><i
                                class="pe-7s-trash" data-tippy="Хотите удалить?" data-tippy-inertia="true"
                                data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder"></i></a>
                    <a href="/" class="product-item_img">
                        <img class="img-full" src="{{ asset('storage/'.$ca->options->avatar)}}" alt="{{$ca->options->slug}}">
                    </a>
                    <div class="product-item_content">
                        <a class="product-item_title" href="#">{{ $ca->options->slug }} <span class="badge bg-primary">{{ $ca->options->taste }}</span></a>
                        <span class="product-item_quantity">{{ $ca->qty }} x {{ $ca->price }} тенге</span>
                    </div>
                </li>
            @endforeach


        </ul>
    </div>
    @if(!empty($emptyCart_message))
        <div class="alert alert-warning" role="alert">
            {!! $emptyCart_message !!}
        </div>
    @endif
    <div class="minicart-item_total">
        <span>Итог товаров: {{ $cartCount }}</span>
        <span class="ammount">{{ $cartTotal }}тенге</span>
    </div>
    <div class="group-btn_wrap d-grid gap-2">
        <button wire:click="destroyCart" type="submit" class="btn btn-dark btn-primary-hover">Очистить корзину</button>
            <a wire:click="checkoutCart" class="btn btn-dark btn-primary-hover">Перейти к оплате</a>
    </div>
</div>