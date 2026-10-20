<?php

namespace App\Models\Admin\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Banner extends Model{

        use SoftDeletes;

        protected $table='banners';
        protected $guarded=['id'];
        protected $casts = ['expire_at'=>'datetime'];


        public function getCreateAttribute(){
                $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
                return CalendarUtils::convertNumbers($persian);
           }


        public function getPositionBannerAttribute(){
              return $this->position == 0  ?  'بنر - بالا صفحه ی اصلی ' : 'بنر - وسط صفحه ی اصلی';
         }
         

        // Scope برای بنرهای فعال
        public function scopeActive($query){
              return $query->where('status', 1)->where('expire_at', '>', now());
        }




}
