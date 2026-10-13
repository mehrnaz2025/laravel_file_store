<?php

namespace App\Models\Admin\Content;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Menu extends Model{
     use SoftDeletes,CascadeSoftDeletes;

     protected $table="menus";
     protected $guarded =['id'];
     protected $cascadeSoftDeletes=['children'];



     //پیاده سازی روابط مورد نیار

     public function parent(){
         return $this->belongsTo(Menu::class,'parent_id')->default(['name'=>'منوی اصلی']);
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




}
