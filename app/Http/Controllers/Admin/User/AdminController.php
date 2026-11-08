<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{

      public function index() {
            $admins=User::query()->where('is_admin',1)->latest()->paginate(5);
            return view('admin.user.admin.index', compact('admins'));
       }




}
