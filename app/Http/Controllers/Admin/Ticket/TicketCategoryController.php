<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Admin\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller{

       public function index(){
            $categories =TicketCategory::query()->latest()->paginate(5);
            return view('admin.ticket.ticket-category.index', compact('categories'));
       }


        public function create(){
            return view('admin.ticket.ticket-category.create');
        }


        public function store(TicketCategoryRequest $request){
             $inputs = $request->all();
             TicketCategory::query()->create($inputs);
             return to_route('admin.tickets.ticket-category.index')->with('success', 'دسته بندی تیکت با موفقیت ایجاد شد');
        }


        public function edit(TicketCategory $ticketCategory){
             return view('admin.ticket.ticket-category.edit', compact('ticketCategory'));
        }


        public function update(TicketCategoryRequest $request, TicketCategory $ticketCategory){
              $inputs = $request->all();
              $ticketCategory->update($inputs);
              return to_route('admin.tickets.ticket-category.index')->with('success', 'دسته بندی تیکت با موفقیت ویرایش شد');
        }





}
