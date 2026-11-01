<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller{

    public function index(){
        $roles=Role::query()->latest()->paginate(3);
        return view('admin.user.role.index',compact('roles'));
    }



    public function create(){
        $permissions=Permission::all();
        return view('admin.user.role.create',compact('permissions'));
    }


     public function store(RoleRequest $request){

            $inputs=$request->all();
            $role=Role::create($inputs);
            $role->givePermissionTo($request->permissions);
            return to_route('admin.user.role.index')->with('success',' نقش با موفقیت ایجاد شد');

    }


    public function edit(Role $role){
         $permissions=Permission::all();
         return view('admin.user.role.edit',compact('role','permissions'));
    }


    public function update(RoleRequest $request,Role $role){
        $inputs=$request->all();
        $role->update($inputs);
        $role->syncPermissions($request->permissions);
        return to_route('admin.user.role.index')->with('success',' نقش  با موفقیت ویرایش شد');
    }




    public function destroy(Role $role){
        $role->delete();
        return to_route('admin.user.role.index')->with('success','نقش با موفقیت حذف شد');
    }





}
