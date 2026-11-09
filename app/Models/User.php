<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Ticket\TicketAdmin;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
use Spatie\Permission\Traits\HasRoles;

// #[Fillable(['name', 'email', 'password','is_admin'])]
// #[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{

    use HasFactory, Notifiable,HasRoles;

    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  public function ticketAdmin()
    {
        return $this->hasOne(TicketAdmin::class);
    }

   //accessor
    public function getCreateAttribute(){
        $persian=Jalalian::forge($this->created_at)->format('Y/m/d');
        return CalendarUtils::convertNumbers($persian);
    }

}
