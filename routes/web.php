<?php

use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\TagController;
use App\Http\Controllers\Admin\DashboardCotroller;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\FileController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function(){

       Route::get('/',DashboardCotroller::class)->name('dashboard');


         Route::prefix('market')->name('market.')->group(function(){

               Route::resource('category', CategoryController::class);
               Route::get('/active-category',[CategoryController::class,'activeStatus'])->name('category.active-category');
               Route::get('/inactive-category',[CategoryController::class,'inactiveStatus'])->name('category.inactive-category');

               //product routes
               Route::resource('product', ProductController::class);
               Route::get('/active-product',[ProductController::class,'activeStatus'])->name('product.active-product');
               Route::get('/inactive-product',[ProductController::class,'inactiveStatus'])->name('product.inactive-product');

               //product-file routes
                Route::get('/product-file/{product}',[FileController::class,'index'])->name('product-file.index');
                Route::get('/product-file/{product}/create',[FileController::class,'create'])->name('product-file.create');
                Route::post('/product-file/{product}/store',[FileController::class,'store'])->name('product-file.store');
                Route::get('/product-file/{product}/edit/{file}',[FileController::class,'edit'])->name('product-file.edit');
                Route::put('/product-file/{product}/update/{file}',[FileController::class,'update'])->name('product-file.update');
                Route::delete('/product-file/{product}/destroy/{file}',[FileController::class,'destroy'])->name('product-file.destroy');
                Route::get('/product-file/{product}/download/{file}', [FileController::class, 'download'])->name('product-file.download');


       });

       Route::prefix('content')->name('content.')->group(function(){

               Route::resource('menu', MenuController::class);
               Route::get('/active-menu',[MenuController::class,'activeStatus'])->name('menu.active-menu');
               Route::get('/inactive-menu',[MenuController::class,'inactiveStatus'])->name('menu.inactive-menu');

               Route::resource('tag', TagController::class);
               Route::get('/active-tag',[TagController::class,'activeStatus'])->name('tag.active-tag');
               Route::get('/inactive-tag',[TagController::class,'inactiveStatus'])->name('tag.inactive-tag');

               Route::resource('banner', BannerController::class);

       });


       Route::prefix('setting')->name('setting.')->group(function(){

               Route::get('/', [SettingController::class,'index'])->name('index');
               Route::get('/set', [SettingController::class,'set'])->name('set');
               Route::post('/set/store',[SettingController::class,'setStore'])->name('set.store');

       });


});
