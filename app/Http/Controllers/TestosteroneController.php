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
    public function index()
    {
        $items = new Testosterone();
        $allProducts = Testosterone::where('available', '!=', '0')->with(['testosteroneBrandBond'])->groupBy('productName')->paginate(15);
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
        $categories = TestosteroneMainCategory::all();
        foreach ($categories as $category){
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
        return view('testosterone', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'subCategories', 'subCategoryCountFinal'));
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
