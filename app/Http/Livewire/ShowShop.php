<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Testosterone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShowShop extends Component
{
    public $product_slug;
    public function render()
    {
        $cart = Cart::content();
        return view('livewire.show-shop', compact('cart'));
    }


    public function addToCart($slug){
        $product = Products::where('slug', $slug)->take(1)->get();

        if ($product->count() === 0){
            $product = Testosterone::where('slug', $slug)->take(1)->get();
            Cart::add(['id' => $product[0]->id, 'name'=> $product[0]->slug, 'qty'=> '1', 'price'=> $product[0]->priceShop, 'weight'=> '0', 'options'=> ['slug' => $product[0]->productName, 'avatar' => $product[0]->avatar, 'taste' => 'Без вкуса', 'marker' => 'testosterone']]);
        }else{
            Cart::add(['id' => $product[0]->id, 'name'=> $product[0]->slug, 'qty'=> '1', 'price'=> $product[0]->priceShop, 'weight'=> '0', 'options'=> ['slug' => $product[0]->categoryName, 'avatar' => $product[0]->avatar, 'taste' => $product[0]->tasteBond->taste, 'marker' => 'nutrition']]);
        }
        $this->emit('cart_updated');
    }
    public function removeFromCart($slug){
        $rowId = Cart::content()->where('name', $slug);
        foreach ($rowId as $item) {
            Cart::remove($item->rowId);
        }
        $this->emit('cart_updated');
    }
}
