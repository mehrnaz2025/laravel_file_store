<?php

namespace App\Models;
use App\Models\WalletTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Wallet extends Model{

       use SoftDeletes;

      protected $table='wallets';
      protected $guarded=['id'];


        public function user() {
                return $this->belongsTo(User::class,'user_id');
            }

        public function transactions(){
            return $this->hasMany(WalletTransaction::class);
        }



      //accessor
         public function getCreateAttribute(){
                $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
                return CalendarUtils::convertNumbers($persian);
            }




}
