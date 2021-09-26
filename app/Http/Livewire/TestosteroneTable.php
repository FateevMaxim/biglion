<?php

namespace App\Http\Livewire;

use App\Models\Testosterone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class TestosteroneTable extends Component
{
    public $quantity;
    public $product_id;
    public $product_slug;
    public $productName;
    protected $listeners = ['cart_updated' => 'render'];
    public function mount(){
        $this->quantity[$this->product_slug] = 1;

    }

    public function render()
    {
        $cart = Cart::content();
        return view('livewire.testosterone-table', compact( 'cart'));
    }
    public function addToCart($product_id){
        $product = Testosterone::where('slug', $this->product_slug)->take(1)->get();
        Cart::add(['id' => $product[0]->id, 'name'=> $product[0]->slug, 'qty'=> $this->quantity[$product_id], 'price'=> $product[0]->priceShop, 'weight'=> '0', 'options'=> ['slug' => $product[0]->productName, 'brand' => $product[0]->brand, 'avatar' => $product[0]->avatar]]);
        //return redirect()->route('singleProduct', ['id' => $product[0]->id])->with('message', 'Добавлено в корзину');
        $this->emit('cart_updated');
    }

    public function increaseQty(){
        $this->quantity[$this->product_slug]++;
    }

    public function decreaseQty(){
        if($this->quantity[$this->product_slug] > 1){
            $this->quantity[$this->product_slug]--;
        }

    }
}
