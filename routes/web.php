<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CartControllerr;
use App\Http\Controllers\Client\ClientController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', ClientController::class);
Route::get('category', [ClientController::class,'category']);
Route::get('view-products/{slug}', [ClientController::class,'viewCategories']);
Route::get('category/{category_slug}/{product_slug}', [ClientController::class,'viewProducts']);


Auth::routes();

// Route::middleware(['auth'])->group(function () {
//     Route::post('add-to-cart', [CartControllerr::class , 'store']);
// });
Route::post('add-to-cart', [CartControllerr::class , 'store']);
Route::post('delete-cart-item', [CartControllerr::class , 'destroy']);
Route::post('update-cart', [CartControllerr::class , 'update']);
Route::get('cart', [CartControllerr::class , 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::prefix('admin')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('admin.index');
    //     });
    
    //     Route::resource('/category', CategoryController::class);
    //     Route::resource('/product', ProductController::class);
    // });
// });

Route::get('/account', function () {
    return view('account');
})->middleware(['auth','role:admin,manager,user']);

Route::middleware(['auth', 'role:admin,manager'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        });
    
        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
    });
});
