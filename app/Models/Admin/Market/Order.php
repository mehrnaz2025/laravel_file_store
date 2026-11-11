<?php

namespace App\Models\Admin\market;

use App\Models\Admin\market\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
class Order extends Model{
     use SoftDeletes;
     protected $guarded = ['id'];


     public function user() {
        return $this->belongsTo(User::class);
    }


    //accessor
    public function getCreateAttribute(){
        $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }


    public function orderItems(){
            return $this->hasMany(OrderItem::class);
    }



       public function getOrderStatusAttribute(){
        switch ($this->status){
                 case 0:
                $status = 'در انتظار ';
                break;
                case 1:
                $status = 'موفق';
                break;
                case 2:
                $status = 'ناموفق';
                break;
                case 4:
                $status = 'لغو شده';
                break;
                default:
                $status = 'خطا ';
        }
        return $status;
    }

}
