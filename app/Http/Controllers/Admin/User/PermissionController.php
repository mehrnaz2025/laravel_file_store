<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
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



}
