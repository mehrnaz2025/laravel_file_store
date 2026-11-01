<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
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


}
