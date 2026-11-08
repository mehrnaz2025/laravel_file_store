<?php

namespace App\Models\Admin\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketPriority extends Model
{
    use SoftDeletes;
    protected  $table='ticket_priorities';
    protected  $guarded=['id'];

}
