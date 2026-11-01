<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller{


    public function index(){
        $permissions=Permission::query()->latest()->paginate(5);
        return view('admin.user.permission.index',compact('permissions'));
    }


    public function create(){
        return view('admin.user.permission.create');
    }


    public function store(PermissionRequest $request){
        $inputs=$request->all();
        Permission::create($inputs);
        return to_route('admin.user.permission.index')->with('success','مجوز دسترسی با موفقیت ایجاد شد');

    }



   public function destroy(Permission $permission){
        $permission->delete();
        return to_route('admin.user.permission.index')->with('success','مجوز دسترسی با موفقیت حذف شد');
    }





}
