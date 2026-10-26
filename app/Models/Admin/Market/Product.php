<?php

namespace App\Models\Admin\Market;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Product extends Model{

    use SoftDeletes,Sluggable;
    // use SoftDeletes,Sluggable,CascadeSoftDeletes;

      protected $table='products';
      protected $guarded=['id'];
    //   protected $cascadeDeletes=['files'];


        public function sluggable(): array {
                return [
                    'slug' => [ 'source' => 'name' ]
                ];
         }


       //relations method
        public function category(){
            return $this->belongsTo(Category::class,'category_id','id');
        }

         public function user() {
             return $this->belongsTo(User::class,'user_id');
         }


        //accessor
        public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
            return CalendarUtils::convertNumbers($persian);
        }



      //scopes methods
        public function scopeActiveProducts(Builder $query){
            return $query->where('status', 1);
        }


        public function scopeInactiveProducts(Builder $query){
            return $query->where('status', 0);
        }


        public function scopeAllProducts(Builder $query){
            return $query;
        }










}
