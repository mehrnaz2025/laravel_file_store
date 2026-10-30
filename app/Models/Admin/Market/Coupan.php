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



    public function getStartDatePersianAttribute() {
        if (!$this->start_date) return '';
        $persian = Jalalian::forge($this->start_date)->format('Y/m/d');
        // $persian = Jalalian::forge($this->start_date)->format('Y/m/d H:i');
        return CalendarUtils::convertNumbers($persian);
    }

    public function getEndDatePersianAttribute()
    {
        if (!$this->end_date) return '';
        $persian = Jalalian::forge($this->end_date)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }





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
