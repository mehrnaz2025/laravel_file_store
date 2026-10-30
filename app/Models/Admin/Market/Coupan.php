<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Coupan extends Model{

     use SoftDeletes;

    protected $table='coupans';
    protected $guarded=['id'];




// ******************************some scops*************************************
        public function scopeActiveCoupans(Builder $query): Builder{
            return $query->where('status', 1);
        }



        public function scopeInactiveCoupans(Builder $query): Builder{
            return $query->where('status', 0);
        }



        public function scopeAllCoupans(Builder $query): Builder{
            return $query;
        }



}
