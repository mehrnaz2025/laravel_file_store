<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller{

        public function index() {
            $clients=User::query()->where('is_admin',0)->latest()->paginate(5);
            return view('admin.user.client.index', compact('clients'));
       }


        public function create() {
                return view('admin.user.client.create');
         }



        public function store(AdminRequest $request) {
            dd('gg');
                $inputs = $request->all();
                $inputs['password'] = Hash::make($request->password);
                $inputs['is_admin'] = 0;

              User::create($inputs);

                return to_route('admin.user.client.index')->with('success', 'کاربر جدید با موفقیت ثبت شد');
        }


    public function edit(User $client){

        return view('admin.user.client.edit',compact('client'));
    }


         public function update(AdminRequest $request, User $client){
                $inputs = $request->all();
                $client->update($inputs);
                return to_route('admin.user.client.index')->with('success', 'کاربر  با موفقیت ویرایش شد');
         }


        public function destroy(User $client){
            $client->forceDelete();
            return to_route('admin.user.client.index')->with('success', 'کاربر با موفقیت حذف شد');
        }

}
