<?php



namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Coupan;
use Illuminate\Http\Request;

class CoupanController extends Controller
{

    public function index() {
         $coupans=Coupan::query()->latest()->paginate(5);
         return view('admin.market.coupan.index',compact('coupans'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Coupan $coupan)
    {
        //
    }


    public function edit(Coupan $coupan)
    {
        //
    }


    public function update(Request $request, Coupan $coupan)
    {
        //
    }


    public function destroy(Coupan $coupan)
    {
        //
    }




      public function activeStatus(){
         $coupans=Coupan::query()->activeCoupans()->latest()->paginate(12);
         return view('admin.market.coupan.index',compact('coupans'));
      }

    public function inactiveStatus(){

         $coupans=Coupan::query()->inactiveCoupans()->latest()->paginate(12);
         return view('admin.market.coupan.index',compact('coupans'));
    }

}
