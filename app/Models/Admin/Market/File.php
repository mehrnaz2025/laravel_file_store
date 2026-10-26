<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
class File extends Model{

        protected $table='files';
        protected $guarded=['id'];
        protected $appends = ['icon'];



       public function product(){
              return $this->belongsTo(Product::class,'product_id','id');
        }


        //accessor
      public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
            return CalendarUtils::convertNumbers($persian);
      }



}
