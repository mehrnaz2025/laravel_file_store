<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Admin\Content\Menu;


class MenuController extends Controller{

    public function index() {

        $menus=Menu::query()->latest()->paginate(5);
        return view('admin.content.menu.index',compact('menus'));
    }


    public function create(){
        $menus=Menu::where('parent_id',null)->where('status',1)->get();
        return view('admin.content.menu.create',compact('menus'));
    }


    public function store(MenuRequest $request){
          $inputs=$request->all();
          Menu::query()->create($inputs);
          return to_route('admin.content.menu.index')->with('success','منو با موفقت ایجاد شد');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Menu $menu){
         $parentMenus=Menu::query()->where('parent_id',null)->get()->except($menu->id);

         return  view('admin.content.menu.edit',compact('menu','parentMenus'));
    }


    public function update(MenuRequest $request,Menu $menu){
            $inputs=$request->all();
            $menu->update($inputs);
            return to_route('admin.content.menu.index')->with('success','منو با موفقت ایجاد شد');
    }


    public function destroy(Menu $menu){
            $menu->delete();
             return to_route('admin.content.menu.index')->with('success','منو با موفقت حذف شد');
    }


    public function activeStatus(){
         $menus=Menu::activeMenu()->latest()->paginate(5);
         return view('admin.content.menu.index',compact('menus'));
    }

        public function inactiveStatus(){
         $menus=Menu::inactiveMenu()->latest()->paginate(5);
         return view('admin.content.menu.index',compact('menus'));
    }



}
