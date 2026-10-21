<?php

use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\TagController;
use App\Http\Controllers\Admin\DashboardCotroller;
use App\Http\Controllers\Admin\Market\CategoryController;
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
