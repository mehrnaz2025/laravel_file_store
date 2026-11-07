<?php

namespace App\Models\Admin\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model{

    use SoftDeletes;

    protected $table='tickets';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
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
}
