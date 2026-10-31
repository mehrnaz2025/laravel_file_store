<?php



namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CoupanRequest;
use App\Models\Admin\Market\Coupan;
use Illuminate\Http\Request;

class CoupanController extends Controller
{

    public function index() {
         $coupans=Coupan::query()->latest()->paginate(5);
         return view('admin.market.coupan.index',compact('coupans'));
    }


    public function create(){
        return view('admin.market.coupan.create');
    }


    public function store(CoupanRequest $request)
    {
       //dd($request->all());

         $timeStamStartDate=substr($request->start_date,0,10);
         $start_date=date("Y-m-d H:i:s",(int)$timeStamStartDate);

        $timeStamEndDate=substr($request->end_date,0,10);
        $end_date=date("Y-m-d H:i:s",(int)$timeStamEndDate);

        Coupan::query()->create([
            'code'       =>$request->code,
            'percent'    =>$request-> percent,
            'status'     =>$request-> status,
            'start_date' => $start_date,
            'end_date'   =>$end_date,
        ]);

        return to_route('admin.market.coupan.index') ->with('success', 'کد تخفیف با موفقیت ایجاد شد ');

    }


    public function show(Coupan $coupan){
        //
    }


    public function edit(Coupan $coupan){
        return view('admin.market.coupan.edit',compact('coupan'));
    }


    public function update(CoupanRequest $request, Coupan $coupan){

         $timeStamStartDate=substr($request->start_date,0,10);
         $start_date=date("Y-m-d H:i:s",(int)$timeStamStartDate);

        $timeStamEndDate=substr($request->end_date,0,10);
        $end_date=date("Y-m-d H:i:s",(int)$timeStamEndDate);

       $coupan->update([
                'code'       =>$request->code,
                'percent'    =>$request-> percent,
                'status'     =>$request-> status,
                'start_date' => $start_date,
                'end_date'   =>$end_date,
        ]);

        return to_route('admin.market.coupan.index') ->with('success', 'کد تخفیف با موفقیت ویرایش شد ');
    }


    public function destroy(Coupan $coupan){
        $coupan->delete();
        return to_route('admin.market.coupan.index') ->with('success', 'کد تخفیف با موفقیت حذف شد ');
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
