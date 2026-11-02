<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;



class WalletTransactionController extends Controller{



       public function index(Request $request){
            $transactions= WalletTransaction::with(['wallet.user'])->orderBy('id', 'desc')->paginate(10);
            return view('admin.user.wallet-transactions.index', compact('transactions'));
        }

}
