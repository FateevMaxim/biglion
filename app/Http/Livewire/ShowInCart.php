<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\ProductsCategories;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShowInCart extends Component
{
    protected $listeners = ['cart_updated' => 'render'];
    public $checkout_message = "";
    public function render()
    {


        $cart = Cart::content();
        $cartTotal = Cart::priceTotal();
        $cartCount = Cart::count();
        return view('livewire.show-in-cart', compact('cart', 'cartTotal', 'cartCount'));
    }
    public function destroyCart()
    {
        $this->checkout_message = "";
        Cart::destroy();
        $this->emit('cart_updated');
    }
    public function removeCart($rowId)
    {
        $this->checkout_message = "";
        Cart::remove($rowId);
        $this->emit('cart_updated');
    }
    public function checkoutCart(){
        $this->redirectRoute('cart');
    }
}
