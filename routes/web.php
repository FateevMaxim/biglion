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
Route::get('/offer', [IndexController::class, 'offer']);
Route::get('/details', [IndexController::class, 'details']);

Route::resource('Product', ProductController::class);
Route::resource('Shop', ShopController::class);
Route::get('/testosterone', [TestosteroneController::class, 'index']);
Route::get('/testosterone/create', [TestosteroneController::class, 'createTestosterone'])->name('createTestosterone');
Route::post('/testosterone/store', [TestosteroneController::class, 'storeTestosterone'])->name('storeTestosterone');

Route::get('/shop/purpose/{id}', [ShopFilterController::class, 'purpose']);
Route::get('/shop/category/{id}', [ShopFilterController::class, 'category']);
Route::get('/shop/brand/{id}', [ShopFilterController::class, 'brand']);
Route::get('/shop/taste/{id}', [ShopFilterController::class, 'taste']);
Route::get('/singleProduct/{id}', [SingleProductController::class, 'index']);

Route::get('/singleTestosterone/{id}', [SingleProductController::class, 'singleTestosterone']);
Route::get('/shop/categoryTestosterone/{id}', [TestosteroneFilterController::class, 'categoryTestosterone']);
Route::get('/shop/subCategoryTestosterone/{id}', [TestosteroneFilterController::class, 'subCategoryTestosterone']);
Route::get('/shop/brandTestosterone/{id}', [TestosteroneFilterController::class, 'brandTestosterone']);

Route::get('/login', function () {
    return view('index');
})->middleware(['auth']);

require __DIR__.'/auth.php';
