<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use App\Models\ProductsPurpose;
use App\Models\ProductsTaste;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $items = new Products();

        $allProductsMenu = Products::all()->where('available', '!=', '0');


        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajax.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->orderBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->orderBy('categoryName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Products::where('available', '!=', '0')->with(['brandBond'])->groupBy('categoryName')->paginate(15);
        }




        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = ProductsBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count()));
            }
        }

        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $categories = ProductsCategories::all();
        foreach ($categories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->category => (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->category, (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/

        /** Подтягивание и подсчёт товаров с определённой целью**/
        $purposes = ProductsPurpose::all();
        foreach ($purposes as $purpose){
            if (!isset($purposeCount)){
                $purposeCount = collect([$purpose->purpose => (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count())]);
            }else{
                $purposeCountFinal = $purposeCount->put($purpose->purpose, (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённой целью**/


        $cart = Cart::content();
        //dd(@$allProducts);
        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
