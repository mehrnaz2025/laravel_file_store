<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\Setting;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller{

    public function index() {
       $setting=Setting::query()->first();
        return view('admin.setting.index',compact('setting'));
    }



    public function set() {
        $setting = Setting::first();
        return view('admin.setting.set',compact('setting'));
    }




    public function setStore(Request  $request,ImageUploadService  $imageUploadService) {
        //  dd($request->all());
            $setting = Setting::first();
            $inputs = $request->all();
            if($setting){
                    $validator=Validator::make($request->all(),[
                            'title' => 'required|max:120|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'description' => 'required|max:500|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'keywords' => 'required|max:250|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'logo' =>'nullable|image|mimes:png,jpg,jpeg,gif',
                            'icon' =>'nullable|image|mimes:png,jpg,jpeg,gif',
                     ]);


                    if($validator->fails()){
                            return redirect()->back()->withErrors($validator)->withInput();
                    }


                     if($request->hasFile('logo')){
                            $result = $imageUploadService->uploadImage($request->file('logo'), 'logo');
                            if ($result === false) {
                                 return back()->with('error', 'خطا در آپلود فایل');
                            }
                             $inputs['logo'] = $result;
                     }


                     if($request->hasFile('icon')){
                            $result = $imageUploadService->uploadImage($request->file('icon'), 'icon');
                            if ($result === false) {
                                 return back()->with('error', 'خطا در آپلود فایل');
                            }
                             $inputs['icon'] = $result;
                     }

                     $setting->update($inputs);
                       return to_route('admin.setting.index')->with('success','تنظیمات با موفقت ویرایش شد');



            }else{

                  $validator=Validator::make($request->all(),[
                            'title'=> 'required|max:120|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'description'=> 'required|max:500|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'keywords'=> 'required|max:250|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي.,a-zA-Z0-9 ]+$/u',
                            'logo'=>'required|image|mimes:png,jpg,jpeg,gif',
                            'icon'=>'required|image|mimes:png,jpg,jpeg,gif',
                        ]);

                    if($validator->fails()){
                            return redirect()->back()->withErrors($validator)->withInput();
                    }


                    if($request->hasFile('logo')){
                            $result = $imageUploadService->uploadImage($request->file('logo'), 'logo');
                            if ($result === false) {
                                 return back()->with('error', 'خطا در آپلود فایل');
                            }
                             $inputs['logo'] = $result;
                     }


                     if($request->hasFile('icon')){
                            $result = $imageUploadService->uploadImage($request->file('icon'), 'icon');
                            if ($result === false) {
                                 return back()->with('error', 'خطا در آپلود فایل');
                            }
                             $inputs['icon'] = $result;
                     }



                Setting::create($inputs);
                 return to_route('admin.setting.index')->with('success','تنظیمات با موفقت ایجاد شد');


            }

    }


}
