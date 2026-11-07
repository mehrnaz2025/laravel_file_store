<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller{

      public function index(){
            $categories =TicketCategory::query()->latest()->paginate(5);
            return view('admin.ticket.ticket-category.index', compact('categories'));
    }

}
