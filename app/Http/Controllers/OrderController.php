<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
class OrderController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
        
    }
    public function index()
    {
        $orders = Order::with('user')->get();
        
        return view('admin.order.index', compact('orders'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'marchant_id' => 'required',
        ]);
        $orders = [
            'name' => $request->name,
            'user_id' => $request->user_id,
            'marchant_id' => $request->marchant_id
        ];

        $file = $this->request->file('doc');
        $path = public_path('file');
        $fileName = uniqid(). $file->getClientOriginalName();
        $url = url('doc', $fileName);

        $file->move($path, $fileName);
        $orders->doc = $url; 

        $save = Order::insert($orders);
        if ($save) {
            return redirect()->back();
        }
        else {
            return redirect()->back()->withInput();
        }
        
       
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
