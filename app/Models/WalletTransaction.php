<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
class WalletTransaction extends Model{

        use SoftDeletes,CascadeSoftDeletes;

        protected $table='wallet_transactions';
        protected $guarded=['id'];


        
}

