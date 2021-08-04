<div class="product-add-action">
    <ul>
        <li>

            @if ($cart->where('name', $product_slug)->count())
                <a wire:click="removeFromCart({{ json_encode($product_slug) }})" href="#" data-tippy="Удалить из корзины" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                    <i class="pe-7s-close" style="background-color:#941a00; color: #fff;"></i>
                </a>
            @else
                <a wire:click="addToCart({{ json_encode($product_slug) }})"href="#" data-tippy="Добавить в корзину" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                    <i class="pe-7s-cart"></i>
                </a>
            @endif


        </li>
        {{-- <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
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