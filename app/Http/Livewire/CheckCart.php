<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Testosterone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CheckCart extends Component
{
    public array $quantity = [];
    public $cart;
    public $checkout_message = "";
    public $emptyCart_message = "";

    public function mount(){
        if (empty($this->cart)){
            $this->cart = Cart::content();
        }
        foreach ($this->cart as $cartProduct) {
            if(empty($this->quantity[$cartProduct->name])){
                $this->quantity[$cartProduct->name] = $cartProduct->qty;
            }

        }
    }

    public function render()
    {
        $this->cart = Cart::content();
        $cartTotal = Cart::priceTotal();
        return view('livewire.check-cart', compact('cartTotal'));
    }

    public function increaseQty($rowId){
        $this->checkout_message = "";
        $cartQty =  $this->cart->where('rowId',$rowId);
        $this->quantity[$cartQty[$rowId]['name']]++;
        $newQty = $cartQty[$rowId]['qty'] + 1;
        $this->cart = Cart::update($rowId, ['qty' => $newQty]);
        $this->emit('cart_updated');
    }

    public function decreaseQty($rowId){
        $this->checkout_message = "";
        $cartQty =  $this->cart->where('rowId',$rowId);
        if($this->quantity[$cartQty[$rowId]['name']] > 1){
            $this->quantity[$cartQty[$rowId]['name']]--;
            $newQty = $cartQty[$rowId]['qty'] - 1;
            $this->cart = Cart::update($rowId, ['qty' => $newQty]);
            $this->emit('cart_updated');
        }

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
            foreach ($cart as $cartProduct){
                $product = Products::select('slug', 'available')->where('slug', $cartProduct->name)->take(1)->get();

                if ($product->count() === 0) {
                    $product = Testosterone::select('slug', 'available')->where('slug', $cartProduct->name)->take(1)->get();
                }

                if(!$product || $product[0]->available == 0){
                    $this->checkout_message .= "Нет товара на складе";
                }elseif($product[0]->available < $cartProduct->qty){
                    $this->checkout_message .= $product[0]->available." шт. ".$cartProduct->options->slug."; <br />";
                }
            }
        }
        if(!empty($this->checkout_message)){
            return $this->checkout_message;
        }elseif(!empty($this->emptyCart_message)){
            return $this->emptyCart_message;
        }else{
            return redirect()->route('checkout');
        }
    }

}
