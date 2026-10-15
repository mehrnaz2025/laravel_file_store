<?php

namespace App\Models\Admin\Content;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Menu extends Model{
     use SoftDeletes,CascadeSoftDeletes;

     protected $table="menus";
     protected $guarded =['id'];
     protected $cascadeDeletes=['children'];



     //پیاده سازی روابط مورد نیار

     public function parent(){
         return $this->belongsTo(Menu::class,'parent_id')->withDefault(['name'=>'منوی اصلی']);
      }

     public function children(){
         return $this->hasMany(Menu::class,'parent_id');
      }


      //تعریف اکسسور برای تاریخ شمسی و نمایش اعداد فارسی

      public function getCreateAttribute(){
           $persian=Jalalian::forge($this->create_at)->format('Y/m/d');
           return CalendarUtils::convertNumbers($persian);
      }

      public function getUpdateAttribute(){
           $persian=Jalalian::forge($this->updated_at)->format('Y/m/d');
           return CalendarUtils::convertNumbers($persian);
      }




     //پیاده سازی اسکوپ برای نمیش انواع وضعیت های منو

        public function scopeActiveMenu(Builder $query): Builder{
           return $query->where('status', 1);
         }



        public function scopeInactiveMenu(Builder $query): Builder{
            return $query->where('status', 0);
        }



        public function scopeAllMenu(Builder $query): Builder{
            return $query;
        }



}
