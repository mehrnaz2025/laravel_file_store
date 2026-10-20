<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(){
          $banners=Banner::query()->latest()->paginate(5);
          return view('admin.content.banner.index',compact('banners'));
    }


    public function create(){
        //
    }



    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
