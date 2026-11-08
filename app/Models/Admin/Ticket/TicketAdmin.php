<?php

namespace App\Models\Admin\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class TicketAdmin extends Model
{

        use SoftDeletes;

        protected $table='ticket_admins';
        protected $guarded = ['id'];

        public function  user(){
             return $this->belongsTo(User::class,'user_id');
        }

     //accessor
        public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
            return CalendarUtils::convertNumbers($persian);
        }







}
