<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class HomeController extends Controller{

   public function index(){

          $newestAudioProducts = Product::query()->where('status', 1)->where('marketable', 1)
                                       ->whereHas('files',function ($query) {
                                                $query->whereIn('type',[0,1]);
                                        })->latest()->limit('8')->get();

          $newestPdfProducts= Product::query()->where('status', 1)->where('marketable', 1)
                                      ->where('files',function ($query) {
                                                $query->whereIn('type',6);
                                        })->latest()->limit('8')->get();


          $bestSellingAudio=Product::query()->where('status', 1)->where('marketable', 1)
                                   ->whereHas('files',function ($query) {
                                                $query->whereIn('type',[0,1]);
                                     })
                                     ->withCount('orderItems')
                                     ->orderBy('order_items_count', 'desc')->limit('8')->get();

           $bestSellingPdf=Product::query()->where('status', 1)->where('marketable', 1)
                                   ->whereHas('files',function ($query) {
                                                $query->where('type', 6);
                                     })
                                     ->withCount('orderItems')
                                     ->orderBy('order_items_count', 'desc')->limit('8')->get();




        return view('app.index');
    }




}
