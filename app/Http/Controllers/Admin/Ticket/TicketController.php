<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{


    public function index()
    {
        $tickets = Ticket::query()->whereNull('ticket_id')->latest()->paginate(5);
        return view('admin.ticket.index', compact('tickets'));
    }


    public function show(Ticket $ticket) {

        return view('admin.ticket.show', compact('ticket'));
    }


    public function reply(Request $request, Ticket $ticket){

            $inputs['status'] = 1;
            $inputs['seen'] = 1;
            $inputs['ticket_id'] = $ticket->id;
            $inputs['description'] = $request->description;
            $inputs['reference_id'] = Auth::user()->ticketAdmin->id;
            $inputs['user_id'] = $ticket->user_id;
            $inputs['priority_id'] = $ticket->priority_id;
            $inputs['category_id'] = $ticket->category_id;
            $inputs['subject'] = $ticket->subject;
            Ticket::create($inputs);
            return back()->with('success', 'پاسخ با موفقیت ثبت شد');
    }


    public function changeStatus(Ticket $ticket)
    {
        $ticket->status = $ticket->status === 1 ? 0 : 1;
        $ticket->save();
        return back()->with('success', 'تغییر وضعیت  شما با موفقیت انجام شد');
    }




}
