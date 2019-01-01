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
        // $orders = Order::with('user')->get();
        $orders = Order::all();
        
        // return $orders;
        return view('admin.order.index', compact('orders'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'user_id' => 'required',
            'marchant_id' => 'required',
        ]);

        $orders = new Order;
        $orders->name = request()->input('name');
        $orders->user_id = request()->input('user_id');
        $orders->marchant_id = request()->input('marchant_id');

        $file = $this->request->file('doc');
        $path = public_path('file');
        $fileName = uniqid(). $file->getClientOriginalName();
        $url = url('doc', $fileName);

        $file->move($path, $fileName);
        $orders->doc = $url; 
        
        $orders->save();
        if ($orders->save()) {
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
}
