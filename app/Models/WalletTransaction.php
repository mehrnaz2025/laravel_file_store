<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
class WalletTransaction extends Model{

        use SoftDeletes,CascadeSoftDeletes;

        protected $table='wallet_transactions';
        protected $guarded=['id'];

        public function wallet() {
            return $this->belongsTo(Wallet::class);
        }




        public function getTypeTransactionAttribute() {
            echo $this->type === 1 ? '<span style="color: #22c55e; font-size: 2rem;">&#9679;</span>شارژ' : '<span style="color: #ef4444; font-size: 2rem;">&#9679;</span>برداشت';
        }

        public function getAmountTransactionAttribute() {
            $sign = $this->type === 1 ? '+' : '-';
            return $sign . number_format($this->amount);
        }

       public function getIsCreditAttribute(){
            echo $this->type === 1 ? 'style="color: green"': 'style="color:red"' ;
        }


        //accessor
         public function getCreateAttribute(){
                $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
                return CalendarUtils::convertNumbers($persian);
           }





}

