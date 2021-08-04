<form action="javascript:void(0)">
    <div class="table-content table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="product_remove">Удалить</th>
                <th class="product-thumbnail">Картинка</th>
                <th class="cart-product-name">Товар</th>
                <th class="product-price">Цена</th>
                <th class="product-quantity">Количество</th>
                <th class="product-subtotal">Всего</th>
            </tr>
            </thead>
<tbody>
@foreach($cart as $cartProduct)
    <tr>
        <td class="product_remove">
            <a wire:click="removeCart({{ json_encode($cartProduct->rowId) }})">
                <i class="pe-7s-trash" data-tippy="Удалить товар" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
            </a>
        </td>
        <td class="product-thumbnail">
            <div class="col-lg-6 col-md-8 m-auto">
                <img src="{{ asset('storage/'.$cartProduct->options->avatar)}}" alt="{{$cartProduct->options->slug}}">
           </div>
        </td>
        <td class="product-name"><a href="#">{{ $cartProduct->options->slug }} <span class="badge bg-primary">{{ $cartProduct->options->taste }}</span></a></td>
        <td class="product-price"><span class="amount">{{ $cartProduct->price }} тг.</span></td>
        <td class="quantity">
            <div class="cart-plus-minus">
                <input wire:model="quantity.{{ $cartProduct->name }}" class="cart-plus-minus-box" type="number">
                <div wire:click="decreaseQty({{ json_encode($cartProduct->rowId) }})" class="dec qtybutton"><i class="fa fa-minus"></i></div>
                <div wire:click="increaseQty({{ json_encode($cartProduct->rowId) }})" class="inc qtybutton"><i class="fa fa-plus"></i></div>
            </div>
        </td>
        <td class="product-subtotal"><span class="amount">{{ $cartProduct->price * $cartProduct->qty }}</span></td>
    </tr>
@endforeach

</tbody>
        </table>
        @if(!empty($checkout_message))
            <div class="alert alert-warning" role="alert">
                На складе осталось всего:<br /> {!! $checkout_message !!}
            </div>
        @endif
    </div>
    {{--<div class="row">
        <div class="col-12">
            <div class="coupon-all">
                <div class="coupon">
                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                    <input class="button mt-xxs-30" name="apply_coupon" value="Apply coupon" type="submit">
                </div>
                <div class="coupon2">
                    <input class="button" name="update_cart" value="Update cart" type="submit">
                </div>
            </div>
        </div>
    </div>--}}
    <div class="row">
        <div class="col-md-5 ml-auto">

            <div class="cart-page-total">
                <h2>Общая сумма</h2>
                <ul>
                    <li>Всего <span>{{ $cartTotal }} тенге</span></li>
                </ul>
                <a wire:click="checkoutCart" href="#">Перейти к оплате</a>
            </div>
        </div>
    </div>
</form>