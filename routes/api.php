<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Give access to all REST requests via Route::resource('products',ProductController::class);
Route::resource('products',ProductController::class);

Route::get('/products', [ProductController::class, 'index']);

// eg http://127.0.0.1:8000/api/products/2
Route::get('/products/{id}', [ProductController::class, 'show']);

// search for "name" like
// http://127.0.0.1:8000/api/products/search/Prod
Route::get('/products/search/{name}', [ProductController::class, 'search']);

Route::post('/products', [ProductController::class, 'store']);

Route::delete('/products/{id}', [ProductController::class, 'destory']);


// Route::post('/products', function(){
//     return Product::create([
//         'name' => 'Prod One',
//         'slug' => 'prod-one',
//         'description' => 'This is prod 1',
//         'price' => '10.11'
//     ]);
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
