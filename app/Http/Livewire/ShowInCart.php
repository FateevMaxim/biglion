<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\ProductsCategories;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShowInCart extends Component
{
    protected $listeners = ['cart_updated' => 'render'];
    public $emptyCart_message = "";
    public function render()
    {
        $cart = Cart::content();
        $cartTotal = Cart::priceTotal();
        $cartCount = Cart::count();
        if ($cart->count() > 0){
            $this->emptyCart_message = "";
        }
        return view('livewire.show-in-cart', compact('cart', 'cartTotal', 'cartCount'));
    }
    public function destroyCart()
    {
        Cart::destroy();
        $this->emit('cart_updated');
    }
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $this->emit('cart_updated');
    }
    public function checkoutCart(){
        $cart = Cart::content();
        if ($cart->count() === 0){
            $this->emptyCart_message = "Нет товаров в корзине";
        }else{
            $this->redirectRoute('cart');
        }
        $this->emit('cart_updated');
    }
}
