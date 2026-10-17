<?php

namespace App\Models\Admin\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Tag extends Model{

  use SoftDeletes,Sluggable;

   protected $table="tags";
   protected $guarded =['id'];

    public function sluggable(): array {
            return [
                'slug' => [ 'source' => 'name' ]
            ];
        }

     public function getCreateAttribute(){
              $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
              return CalendarUtils::convertNumbers($persian);
     }


     //scope methods

    public function scopeActiveTag(Builder $query): Builder{
           return $query->where('status', 1);
    }


    public function scopeInactiveTag(Builder $query): Builder{
          return $query->where('status', 0);
    }


    public function scopeAllTag(Builder $query): Builder{
          return $query;
    }



}
