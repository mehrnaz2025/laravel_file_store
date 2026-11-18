<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller{

   public function index(){

          $newestAudioProducts = Product::query()->where('status', 1)->where('marketable', 1)
                                       ->whereHas('files',function ($query) {
                                                $query->whereIn('type',[0,1]);
                                        })->latest()->limit('8')->get();

          $newestPdfProducts= Product::query()->where('status', 1)->where('marketable', 1)
                                      ->whereHas('files',function ($query) {
                                                $query->where('type',6);
                                        })->latest()->limit(8)->get();


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


          $mostViewedToday=Product::query()->where('status', 1)
                                         ->where('marketable', 1)
                                         ->withCount(['views'=> function ($query){ $query->where('viewed_at', '>=', Carbon::today());}])
                                         ->orderBy('views_count', 'desc')->limit('6')->get();

          $mostViewedThisWeek=Product::query()->where('status', 1)
                                         ->where('marketable', 1)
                                         ->withCount(['views'=> function ($query){ $query->where('viewed_at',  '>=', Carbon::now()->startOfWeek(carbon::SATURDAY));}])
                                         ->orderBy('views_count', 'desc')->limit('6')->get();

         $mostViewedThisMonth=Product::query()->where('status', 1)
                                         ->where('marketable', 1)
                                         ->withCount(['views'=> function ($query){
                                                     $firstDayOfShamsiMonth = Jalalian::now()->getFirstDayOfMonth();
                                                     $startOfShamsiMonth = $firstDayOfShamsiMonth->toCarbon();//تاریخ شمسی را به میلادی تبدیل می کنه
                                                     $query->where('viewed_at',$startOfShamsiMonth);
                                                    // $query->where('viewed_at', Carbon::now()->startOfMonth());
                                           }])
                                         ->orderBy('views_count', 'desc')->limit('6')->get();


        return view('app.index',compact('newestAudioProducts',
                                        'newestPdfProducts',
                                        'bestSellingAudio',
                                        'bestSellingPdf',
                                        'mostViewedToday',
                                        'mostViewedThisWeek',
                                        'mostViewedThisMonth'
                                        ));
    }




}
