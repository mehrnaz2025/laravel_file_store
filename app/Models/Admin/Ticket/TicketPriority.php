<?php

namespace App\Models\Admin\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Builder;
class TicketPriority extends Model
{
    use SoftDeletes;
    protected  $table='ticket_priorities';
    protected  $guarded=['id'];



    //accessor
    public function getCreateAttribute(){
            $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
            return CalendarUtils::convertNumbers($persian);
    }



    // some scopes
    public function scopeActiveTicketPriority(Builder $query): Builder{
         return $query->where('status', 1);
    }


    public function scopeInactiveTicketPriority(Builder $query): Builder{
         return $query->where('status', 0);
    }

    public function scopeAllTicketPriority(Builder $query): Builder{
          return $query;
    }



}
