<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TravelPackage;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $role= null;
        if (Auth::check()){
            $role = Auth::user()->roles;
        }

        switch ($role) {
            case "SUPERADMIN":
            case "ADMIN":
                return view('pages.admin.dashboard',[
                    'travel_package' => TravelPackage::count(),
                    'transaction' => Transaction::count(),
                    'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
                    'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
                ]);
            default:
                $items = TravelPackage::with(['galleries'])->get();
                return view('pages.home', [
                    'items' => $items,
                ]);
        }
    }

    public function dashboard(){
        
    }
}
