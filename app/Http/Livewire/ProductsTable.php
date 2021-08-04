<?php

namespace App\Http\Livewire;
use App\Models\Products;
use App\Models\ProductsCategories;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductsTable extends Component
{
    public $quantity;
    public $product_id;
    public $product_slug;
    public $categoryName;
    public $changeTaste;
    protected $listeners = ['cart_updated' => 'render'];
    public function mount(){
        $this->quantity[$this->product_slug] = 1;

    }

    public function render()
    {
        if(!empty($this->changeTaste)){
            $aboutToGet_slug = Products::select('slug')->where('categoryName', $this->categoryName)->where('taste', $this->changeTaste)->take(1)->get();
            $this->product_slug = $aboutToGet_slug[0]->slug;
            if (empty($this->quantity[$this->product_slug])){
                $this->quantity[$this->product_slug] = 1;
            }
        }
        $customTasteProduct = Products::select('id', 'taste')->where('available', '!=', '0')->where('categoryName', $this->categoryName)->get();
        $cart = Cart::content();
        return view('livewire.products-table', compact( 'cart', 'customTasteProduct'));
    }
    public function addToCart($product_id){
        $product = Products::where('slug', $this->product_slug)->take(1)->get();
        Cart::add(['id' => $product[0]->id, 'name'=> $product[0]->slug, 'qty'=> $this->quantity[$product_id], 'price'=> $product[0]->priceShop, 'weight'=> '0', 'options'=> ['slug' => $product[0]->categoryName, 'avatar' => $product[0]->avatar, 'taste' => $product[0]->tasteBond->taste]]);
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

