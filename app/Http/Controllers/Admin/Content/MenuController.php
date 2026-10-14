<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Admin\Content\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller{

    public function index() {

        $menus=Menu::query()->latest()->paginate(5);
        return view('admin.content.menu.index',compact('menus'));
    }


    public function create(){
        $menus=Menu::query()->where('status',1)->whereNull('parent_id')->get();
        return view('admin.content.menu.create',compact('menus'));
    }


    public function store(MenuRequest $request){
          $inputs=$request->all();
          Menu::query()->create($inputs);
          return to_route('admin.content.menu.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
