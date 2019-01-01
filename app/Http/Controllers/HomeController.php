<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Merchant;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (app('auth')->user()->role == 0) {

            $merchant = Merchant::all()->count();
            $costumer = User::where('role', 2)->get()->count();
            $order = Order::all()->count();
            return view("admin.dashboard",compact('merchant', 'costumer', 'order'));

        } elseif(app('auth')->user()->role == 1) {

            $order = Order::where('status', 0)->get();
            // return $order;
            
            return view("merchant.dashboard",compact('order'));
        }
        elseif(app('auth')->user()->role == 2) {
            return "halaman user";
        }
        else{
            return "data tidak di temukan";
        }
        
    }
}
