<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller{

    public function index(){
        $roles=Role::query()->latest()->paginate(3);
        return view('admin.user.role.index',compact('roles'));
    }

}
