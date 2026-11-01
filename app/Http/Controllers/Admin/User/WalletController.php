<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller{

    public function index(){
        $wallets = Wallet::query()->latest() ->paginate(10);
        return view('admin.user.wallet.index',compact('wallets'));

    }

}
