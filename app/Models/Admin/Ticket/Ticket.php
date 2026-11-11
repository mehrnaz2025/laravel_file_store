<?php

namespace App\Models\Admin\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
class Ticket extends Model{

    use SoftDeletes;

    protected $table='tickets';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function priority(){
        return $this->belongsTo(TicketPriority::class);
    }


    public function admin(){
        return $this->belongsTo(TicketAdmin::class, 'reference_id');
    }



    public function category(){
        return $this->belongsTo(TicketCategory::class);
    }


    public function parent(){
        return $this->belongsTo($this, 'ticket_id');
    }

    public function children() {
        return $this->hasMany($this, 'ticket_id');
    }



        //accessor
        public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
            return CalendarUtils::convertNumbers($persian);
        }

}
