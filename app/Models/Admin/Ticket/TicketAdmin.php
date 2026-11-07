<?php

namespace App\Models\Admin\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketAdmin extends Model
{

        use SoftDeletes;

        protected $table='ticket_admins';
        protected $guarded = ['id'];

        public function  user(){
             return $this->belongsTo(User::class,'user_id');
        }



}
