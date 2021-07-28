<?php

namespace App\Http\Controllers;

use App\Models\Testosterone;
use App\Models\TestosteroneBrand;
use App\Models\TestosteroneMainCategory;
use App\Models\TestosteroneSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestosteroneController extends Controller
{
    public function index(Request $request)
    {
        $items = new Testosterone();

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajaxTestosterone.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('productName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->paginate(15);
        }


        $allProductsMenu = Testosterone::all()->where('available', '!=', '0');


        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = TestosteroneBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count()));
            }
        }

        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $mainCategories = TestosteroneMainCategory::all();
        $categoriesTestosterone = $mainCategories;
        foreach ($mainCategories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->main_category => (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->main_category, (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/
        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $subCategories = TestosteroneSubCategory::all();
        foreach ($subCategories as $subCategory){
            if (!isset($subCategoryCount)){
                $subCategoryCount = collect([$subCategory->sub_category => (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count())]);
            }else{
                $subCategoryCountFinal = $subCategoryCount->put($subCategory->sub_category, (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/
        //dd(@$allProducts);
        return view('testosterone', compact( 'allProducts', 'brands', 'brandCountFinal', 'mainCategories', 'categoryCountFinal', 'subCategories', 'categoriesTestosterone', 'subCategoryCountFinal'));
    }

    public function createTestosterone()
    {
        $brands = TestosteroneBrand::all();
        $categories = TestosteroneMainCategory::all();
        $subCategories = TestosteroneSubCategory::all();
        return view('layouts.addProductTestosterone', compact('brands', 'categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTestosterone(Request $request)
    {

        foreach ($request->file('pictures') as $file){
            $path[] = Storage::putFile('pictures', $file);
        }

        $fileAvatar = $request->file('avatar');
        $pathAvatar = Storage::putFile('avatars', $fileAvatar);

        $data = $request->input();

        $data['avatar'] = $pathAvatar;
        $data['pictures'] = join('|', $path);


        $random = Str::random(4);
        $data['slug'] = Str::slug($data['productName'].$random );
        $item = new Testosterone($data);
        $item->save();


        if ($item) {
            return redirect()->route('createTestosterone')->with(['success' => 'Товар успещно добавлен']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка добавления'])->withInput();
        }
    }
}
