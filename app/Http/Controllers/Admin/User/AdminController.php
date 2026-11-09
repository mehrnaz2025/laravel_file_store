<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

      public function index() {
            $admins=User::query()->where('is_admin',1)->latest()->paginate(5);
            return view('admin.user.admin.index', compact('admins'));
       }


        public function create() {
                return view('admin.user.admin.create');
         }




        public function store(Request $request) {
            $inputs = $request->all();
            $inputs['password'] = Hash::make($request->password);
            $inputs['is_admin'] = 1;
            $user = User::create($inputs);
            return redirect()->route('admin.user.admin-user.index')->with('success', 'ادمین جدید با موفقیت ثبت شد');
        }


}
