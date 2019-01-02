<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Order;
use App\User;
use App\Merchant;
class OrderController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
        
    }
    public function index()
    {
        if (app('auth')->user()->role == 2) {
            $order = Order::all();
            // return $order;
            return view('user.order.index',compact('order'));
        } else {
            $orders = Order::all();
            $merchant = Merchant::all();
            
            // return $orders;
            return view('admin.order.index', compact('orders', 'merchant'));
        }
        
       
    }
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'user_id' => 'required',
            'marchant_id' => 'required',
            'qty' => 'required',
            'description' => 'required'
        ]);

        $orders = new Order;
        $orders->name = request()->input('name');
        $orders->user_id = request()->input('user_id');
        $orders->marchant_id = request()->input('marchant_id');
        $orders->qty = request()->input('qty');
        $orders->description = request()->input('description');

        $file = $this->request->file('doc');
        $path = public_path('file');
        $fileName = uniqid(). $file->getClientOriginalName();
        $url = url('file', $fileName);

        $file->move($path, $fileName);
        $orders->doc = $url; 
        
        $orders->save();
        if ($orders->save()) {
            if(app('auth')->user()->role == 0) {
               
            }
            elseif(app('auth')->user()->role == 2){
                return redirect('/merchant');
            }
            else{
                return "data saved";
            }
            
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
        $orders = Order::findOrFail($id);
        //delete image
        $filename = basename($orders->doc);
        $path = public_path('file/' . $filename);
        @unlink($path);

        $orders->delete();

        return redirect()->back();
    }

    public function postUpload(Request $request){
        if($request->hasFile('order')){
            $path = $request->file('order')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
 
                foreach ($data as $key => $value) {
                    //print_r($value);
                    $order[] = [
                        'name' => $value->name,
                        'user_id' => $value->user_id,
                        'marchant_id' => $value->marchant_id,
                        'doc' => $value->doc,
                    ];
                }
                if(!empty($order)){
                    Order::insert($order);
                    \Session::flash('success','File improted successfully.');
                }
            }
        }else{
        	\Session::flash('warnning','There is no file to import');
        }
        return Redirect()->back();
    }

    public function Export($type){
        $order = Order::select(
            'name',
            'user_id',
            'marchant_id',
            'doc'
        )->get()->toArray();
        return \Excel::create('order', function($excel) use ($order) {
            $excel->sheet('order Details', function($sheet) use ($order)
            {
                $sheet->fromArray($order);
            });
        })->download($type);
    }
    public function list($list)
    {
        $order = Order::findOrFail($list);
        $order->status = 1;
        $order->save();

        return redirect()->back();
    }
    public function proccess($proccess)
    {
        $order = Order::findOrFail($proccess);
        $order->status = 2;
        $order->save();

        return redirect()->back();
    }
    public function finish($finish)
    {
        $order = Order::findOrFail($finish);
        $order->status = 3;
        $order->save();

        return redirect()->back();
    }

    public function order($order) {
        $order = Merchant::find($order);

        // return $order;
        return view('user.order.form', compact('order'));
    }

}
