<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller{


        public function index(){
                $tickets = Ticket::whereNull('ticket_id')->get();
                return view('admin.ticket.index', compact('tickets'));

        }
}
