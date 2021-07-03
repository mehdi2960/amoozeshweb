<?php

use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\DiscountController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\PanelController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\ProductPropertyController;
use App\Http\Controllers\AdminController\PropertyController;
use App\Http\Controllers\AdminController\PropertyGroupController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\SliderController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\ClientController\CommentController;
use App\Http\Controllers\AdminController\CommentController as AdminCommentController;
use App\Http\Controllers\ClientController\LikeController;
use App\Http\Controllers\ClientController\ProductController as ClientProductController;
use App\Http\Controllers\ClientController\IndexController;
use App\Http\Controllers\ClientController\RegisterController;
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

//Client
Route::prefix('')->group(function (){

    //Product
    Route::get('/',[IndexController::class,'index'])->name('home');
    Route::get('productDetails/{product}',[ClientProductController::class,'show'])->name('productDetails.show');
    Route::post('product/{product}/comments/store',[CommentController::class,'store'])->name('product.comments.store');
    Route::get('/likes/wishlist',[LikeController::class,'index'])->name('likes.wishlist.index');
    Route::post('/likes/{product}',[LikeController::class,'store'])->name('likes.store');
    Route::delete('/likes/{product}',[LikeController::class,'destroy'])->name('likes.destroy');

    //Register
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register/sendmail',[RegisterController::class,'sendMail'])->name('register.sendmail');
    Route::get('register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::post('register/verifyOtp/{user}',[RegisterController::class,'verifyOtp'])->name('register.verifyOtp');
    Route::delete('logout',[RegisterController::class,'logout'])->name('logout');

});

//AdminPanel
Route::prefix('adminPanel')->group(function (){
   Route::resource('/',PanelController::class);
   Route::resource('category',CategoryController::class);
   Route::resource('brand',BrandController::class);
   Route::resource('product',ProductController::class);
   Route::resource('product.gallery',GalleryController::class);
   Route::resource('product.discount',DiscountController::class);
   Route::resource('propertyGroup',PropertyGroupController::class);
   Route::resource('slider',SliderController::class);

   //ProductProperty
   Route::get('products/{product}/properties', [ProductPropertyController::class,'index'])->name('product.properties.index');
   Route::get('products/{product}/properties/create', [ProductPropertyController::class,'create'])->name('product.properties.create');
   Route::post('products/{product}/properties', [ProductPropertyController::class,'store'])->name('product.properties.store');

   //Comment
    Route::get('products/{product}/comments',[AdminCommentController::class,'index'])->name('products.comments.index');
    Route::get('comments/{comment}/edit',[AdminCommentController::class,'edit'])->name('products.comments.edit');
    Route::patch('comments/{comment}/update',[AdminCommentController::class,'update'])->name('products.comments.update');
    Route::delete('comments/{comment}/destroy',[AdminCommentController::class,'destroy'])->name('products.comments.destroy');


    Route::resource('properties', PropertyController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
});
