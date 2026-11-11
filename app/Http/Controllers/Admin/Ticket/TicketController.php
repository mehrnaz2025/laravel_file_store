<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller{


        public function index(){
                $tickets = Ticket::query()->whereNull('ticket_id')->latest()->paginate(5);
                return view('admin.ticket.index', compact('tickets'));
        }


        public function show(Ticket $ticket) {
             return view('admin.ticket.show', compact('ticket'));
        }



}
