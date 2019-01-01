<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'tlp' => 'required',
            'user_id' => 'required',
            'marchant_id' => 'required',
        ]);
        $orders = [
            'name' => $request->nama,
            'tlp' => $request->tlp,
            'user_id' => $request->user_id,
            'marchant_id' => $request->marchant_id
        ];

        $file = $this->request->file('file');
        $path = public_path('file');
        $fileName = uniqid(). $file->getClientOriginalName();
        $url = url('file', $fileName);
        $file->move($path, $fileName);
        $orders->file = $url; 

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
