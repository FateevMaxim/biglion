<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use App\Models\ProductsPurpose;
use App\Models\ProductsTaste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Products::all();
        return view('welcome', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = ProductsBrand::all();
        $categories = ProductsCategories::all();
        $tastes = ProductsTaste::all()->sortBy('taste');
        $purposes = ProductsPurpose::all();
        return view('layouts.addProduct', compact('brands', 'categories', 'tastes', 'purposes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach ($request->file('pictures') as $file){
            $path[] = Storage::putFile('pictures', $file);
        }

        $fileAvatar = $request->file('avatar');
        $pathAvatar = Storage::putFile('avatars', $fileAvatar);

        $data = $request->input();

        $data['avatar'] = $pathAvatar;
        $data['pictures'] = join('|', $path);




        foreach ($request->input('taste') as $taste){
            $data['taste'] = $taste;
            $random = Str::random(4);
            $data['slug'] = Str::slug($data['categoryName'].$random );
            $item = new Products($data);
            $item->save();
        }

        if ($item) {
            return redirect()->route('Product.create')->with(['success' => 'Товар успещно добавлен']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка добавления'])->withInput();
        }
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
