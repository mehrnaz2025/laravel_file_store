<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\WalletRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller{

    public function index(){
        $wallets = Wallet::query()->latest() ->paginate(10);
        return view('admin.user.wallet.index',compact('wallets'));

    }


    public function create(){
        $users = User::all();
        return view('admin.user.wallet.create',compact('users'));
    }


    public function store(WalletRequest $request){

          $inputs=$request->all();
          $wallet = Wallet::where('user_id',$request->user_id)->first();

            if ($wallet) {
                    return to_route('admin.user.wallet.index')->with('error','  این کاربر کیف پول دارد ');
            }

            $wallet = Wallet::create($inputs);
            return to_route('admin.user.wallet.index')->with('success','  کیف پول با موفقیت ایجاد شد ');
    }


     public function edit(Wallet $wallet){
        return view('admin.user.wallet.edit',compact('wallet'));
    }

     public function update(WalletRequest $request,Wallet $wallet){
            $inputs=$request->all();
            $wallet->update($inputs);
            return to_route('admin.user.wallet.index')->with('success','  کیف پول با موفقیت ویرایش شد ');

     }





}
