<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Merchant;
use App\Order;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (app('auth')->user()->role == 0) {

            $merchant = Merchant::all()->count();
            $costumer = User::where('role', 2)->get()->count();
            $order = Order::all()->count();
            
            return view("admin.dashboard",compact('merchant', 'costumer', 'order'));

        } elseif(app('auth')->user()->role == 1) {

            $order = Order::all();
            // return $order;
            return view("merchant.dashboard",compact('order'));
        }
        elseif(app('auth')->user()->role == 2) {
            
            $order = Order::all();
            
            return view('user.dashboard', compact('order'));

        }
        else{

            return "data tidak di temukan";

        }
        
    }
}
