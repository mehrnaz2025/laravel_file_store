<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

      public function index() {
            $admins=User::query()->where('is_admin',1)->latest()->paginate(5);
            return view('admin.user.admin.index', compact('admins'));
       }


        public function create() {
                return view('admin.user.admin.create');
         }



        public function store(AdminRequest $request) {
                $inputs = $request->all();
                $inputs['password'] = Hash::make($request->password);
                $inputs['is_admin'] = 1;
                User::create($inputs);
                return to_route('admin.user.admin-user.index')->with('success', 'ادمین جدید با موفقیت ثبت شد');
        }


    public function edit(User $admin){
        return view('admin.user.admin.edit', compact('admin'));
    }


         public function update(AdminRequest $request, User $admin){
                $inputs = $request->all();
                $admin->update($inputs);
                return to_route('admin.user.admin-user.index')->with('success', 'ادمین  با موفقیت ویرایش شد');
         }


        public function destroy(User $admin){
            $admin->forceDelete();
            return to_route('admin.user.admin-user.index')->with('success', 'ادمین با موفقیت حذف شد');
        }







}
