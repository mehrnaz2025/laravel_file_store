<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller{

    public function index() {
       $setting=Setting::query()->first();
        return view('admin.setting.index',compact('setting'));
    }



    public function set() {
        $setting = Setting::first();
        return view('admin.setting.set',compact('setting'));
    }




    public function setStore(Request  $request) {

    }


}
