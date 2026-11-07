<?php

namespace App\Models\Admin\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class TicketCategory extends Model{

    use SoftDeletes;

    protected $table='ticket_categories';
    protected $guarded = ['id'];


    //accessor
    public function getCreateAttribute(){
        $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }


    

}
