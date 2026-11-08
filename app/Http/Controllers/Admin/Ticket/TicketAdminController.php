<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\TicketAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAdminController extends Controller{

    public function index() {
            $admins=User::query()->where('is_admin',1)->latest()->paginate(5);
            return view('admin.ticket.ticket-admin.index', compact('admins'));

    }


    public function changeUserType(User $admin){
             
            TicketAdmin::where('user_id',$admin->id)->first() ?
            TicketAdmin::where('user_id',$admin->id)->forceDelete() :
            TicketAdmin::create([ 'user_id'=>$admin->id]);
           return to_route('admin.ticket.ticket-admin.index')->with('success','تغییر نوع کاربر با موفقیت انجام شد');
    }


}
