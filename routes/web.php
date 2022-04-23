<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutCOntroller;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\ResservationController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\RateingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\FrontController;


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
Route::get('product-list',[FrontController::class,'productlistajax']);
Route::post('searchproduct',[FrontController::class,'searchproduct']);
Route::get('/',[App\Http\Controllers\Frontend\FrontController::class,'index']);
Route::get('category',[App\Http\Controllers\Frontend\FrontController::class,'category']);
Route::get('view-category/{slug}',[App\Http\Controllers\Frontend\FrontController::class,'viewcategory']);

Route::get('category/{cate_slug}/{prod_slug}',[App\Http\Controllers\Frontend\FrontController::class,'productview']);

Auth::routes();
  Route::get('show-cart-data',[WishlistController::class,'cartcount']); 
  Route::get('show-wishlist-data',[WishlistController::class,'wishlistcount']); 

  Route::post('add-to-cart',[CartController::class,'addproduct']);
  Route::post('delete-cart-item',[CartController::class,'destroy']);
  Route::post('update-qty',[CartController::class,'updatequantity']);
  Route::post('add-to-wishlist',[WishlistController::class,'add']);
  Route::get('wishlist-item-delete/{id}',[WishlistController::class,'destroy']);
Route::middleware(['auth'])->group(function(){
     Route::get('cart',[App\Http\Controllers\Frontend\CartController::class,'viewcart']);
     Route::get('checkout',[CheckoutCOntroller::class,'index']);
     Route::post('order-place',[CheckoutCOntroller::class,'placeorder']);
     Route::get('order',[OrderController::class,'index']);
     Route::get('vieworder/{id}',[OrderController::class,'vieworder']);
     Route::get('wishlist',[WishlistController::class,'viewwishlist']);
     Route::post('add-rate',[RateingController::class,'add']);
   
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function(){
     Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'dashboardview']);
     Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class,'index']);
     Route::get('add-category',[App\Http\Controllers\Admin\CategoryController::class,'add']);
     Route::post('insert-category',[App\Http\Controllers\Admin\CategoryController::class,'store']);

     Route::get('edit.category/{id}',[CategoryController::class,'edit']);
     Route::put('update-category/{id}',[CategoryController::class,'update']);
     Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

     Route::get('products',[ProductController::class,'index']);
     Route::get('add-products',[ProductController::class,'add']);
     Route::post('insert-product',[ProductController::class,'store']);
     Route::get('edit.product/{id}',[ProductController::class,'edit']);
     Route::put('update.product/{id}',[ProductController::class,'update']);
     Route::get('delete.product/{id}',[ProductController::class,'destroy']);
     Route::get('orders',[ResservationController::class,'index']);
     Route::get('orders-view/{id}',[ResservationController::class,'orderview']);
     Route::put('update-order/{id}',[ResservationController::class,'updateorder']);
     Route::get('orders-complete/',[ResservationController::class,'completeorder']); 
     Route::get('users',[DashboardController::class,'userdetails']);     
     Route::get('users-all-details/{id}',[DashboardController::class,'alluserdeatils']); 
     Route::get('carousel',[CarouselController::class,'index']);    
     Route::get('carousel-add',[CarouselController::class,'create']);    
     Route::post('carousel-store',[CarouselController::class,'store']);    
     Route::get('delete/{id}',[CarouselController::class,'destroy']);    
     Route::get('edit/{id}',[CarouselController::class,'edit']);    
     Route::PUT('update/{id}',[CarouselController::class,'update']);    
   
});
