<?php

namespace App\Models\Admin\market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model{
     use SoftDeletes;
      protected $guarded = ['id'];

     public function user() {
           return $this->belongsTo(User::class);
     }

    public function order() {
        return $this->belongsTo(Order::class);
    }



}
