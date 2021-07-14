<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::resource('Product', ProductController::class);
Route::resource('Shop', ShopController::class);

Route::get('/shop/purpose/{id}', [ShopFilterController::class, 'purpose']);
Route::get('/shop/category/{id}', [ShopFilterController::class, 'category']);
Route::get('/shop/brand/{id}', [ShopFilterController::class, 'brand']);
Route::get('/shop/taste/{id}', [ShopFilterController::class, 'taste']);
Route::get('/singleProduct/{id}', [SingleProductController::class, 'index']);

Route::get('/login', function () {
    return view('index');
})->middleware(['auth']);

require __DIR__.'/auth.php';
