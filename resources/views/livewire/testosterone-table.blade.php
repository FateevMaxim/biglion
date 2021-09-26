
<div>
    <form wire:submit.prevent="addToCart({{ json_encode($product_slug) }})" method="post">
        @csrf

        <ul class="quantity-with-btn pb-9">
            <li class="quantity">
                <div class="cart-plus-minus">
                    <input wire:model="quantity.{{ $product_slug }}" class="cart-plus-minus-box" type="number">
                    <div wire:click="decreaseQty" class="dec qtybutton"><i class="fa fa-minus"></i></div>
                    <div wire:click="increaseQty" class="inc qtybutton"><i class="fa fa-plus"></i></div>
                </div>
            </li>
            <li class="add-to-cart">
                <button type="submit"
                        class="btn btn-custom-size lg-size btn-primary">@if ($cart->where('name', $product_slug)->count())
                        Добавить ещё @else В корзину @endif</button>
            </li>
            {{--<li class="wishlist-btn-wrap">
                <a class="custom-circle-btn" href="wishlist.html">
                    <i class="pe-7s-like"></i>
                </a>
            </li>--}}
        </ul>
    </form>
</div>