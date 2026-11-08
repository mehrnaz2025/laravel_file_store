<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller{

        public function index(){
             $ticketPriorites =TicketPriority::query()->latest()->paginate(5);
             return view('admin.ticket.ticket-priority.index', compact('ticketPriorites'));
        }


        public function create(){
            return view('admin.ticket.ticket-priority.create');
        }


        public function store(Request $request){
             $inputs = $request->all();
             TicketPriority::query()->create($inputs);
             return to_route('admin.tickets.ticket-priority.index')->with('success', 'اولویت تیکت با موفقیت ایجاد شد');
        }


        public function edit(TicketPriority $ticketPriority){
             return view('admin.ticket.ticket-priority.edit','ticketPriority');
        }


        public function update(Request $request, TicketPriority $ticketPriority){
              $inputs = $request->all();
              $ticketPriority->update($inputs);
              return to_route('admin.tickets.ticket-category.index')->with('success', ' اولویت تیکت با موفقیت ویرایش شد');
        }


        public function destroy(TicketPriority $ticketPriority){
                $ticketPriority->delete();
                return back()->with('success', ' اولویت تیکت با موفقیت حذف شد');
        }



        public function activeStatus(){
               $ticketPriorites=TicketPriority::query()->activeTicketPriority()->latest()->paginate(12);
               return view('admin.ticket.ticket-priority.index', compact('ticketPriorites'));
        }


        public function inactiveStatus(){
               $ticketPriorites=TicketPriority::query()->inactiveTicketPriority()->latest()->paginate(12);
               return view('admin.ticket.ticket-priority.index', compact('ticketPriorites'));
        }


        public function show(){

        }


}
