<?php

namespace App\Models\Admin\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Category extends Model{
    use SoftDeletes,Sluggable,CascadeSoftDeletes;

    protected $table='categories';
    protected $guarded=['id'];
    protected $cascadeDeletes=['children'];


    public function sluggable(): array {
                return [
                    'slug' => [ 'source' => 'name' ]
                ];
    }

    public function parent(){
        return $this->belongsTo($this,'parent_id','id')->withDefault(['name'=>'دسته اصلی']);
    }

    public function children(){
           return $this->hasMany($this,'parent_id','id');
     }

     //accessor
    public function getCreateAttribute(){
        $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }




    // some scopes

    public function scopeActiveCategory(Builder $query): Builder{
        return $query->where('status', 1);
    }


    public function scopeInactiveCategory(Builder $query): Builder{
        return $query->where('status', 0);
    }

    public function scopeAllCategory(Builder $query): Builder{
        return $query;
    }







}
