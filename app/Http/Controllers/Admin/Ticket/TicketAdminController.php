<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAdminController extends Controller{

    public function index() {
        $admins=User::query()->where('is_admin',1)->latest()->paginate(5);
        return view('admin.ticket.ticket-admin.index', compact('admins'));

    }

}
