<?php

namespace App\Models\Admin\market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model{
    use SoftDeletes;

   public function user() {
        return $this->belongsTo(User::class);
    }


    public function orderItems(){
            return $this->hasMany(OrderItem::class);
    }



       public function getOrderStatusAttribute()
    {
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
