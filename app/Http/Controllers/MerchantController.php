<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
use App\User;
class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (app('auth')->user()->role == 0) {
            $merchant = Merchant::all();
            $user = User::where('role', 1)->get();

            // return $merchant;
            return view('admin.merchant.index', compact('merchant', 'user'));
        } 
        elseif(app('auth')->user()->role == 2){
            $merchant = Merchant::all();

            return view('user.merchant', compact('merchant'));
        }
        else {
           return view('page.404');
        }
        
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'user_id' => 'required',
        ]);
        $merchant = [
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'user_id' => $request->user_id
        ];
        $save = Merchant::insert($merchant);
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
        if (app('user')->role = 0) {
            $merchant = Merchant::find($id);

            // return $merchant;
            return view("admin.merchant.form", compact('merchant'));
        } else {
           return view('page.404');            
        }
        
     
    }
    public function update(Request $request, $id)
    {
        $merchant = Merchant::find($id);
        
        $merchant->nama=$request->get('nama');
        $merchant->tlp=$request->get('tlp');
        $merchant->alamat=$request->get('alamat');
        $merchant->deskripsi=$request->get('deskripsi');
        $merchant->save();
        return redirect('/merchant');
    }
    public function destroy($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();

        return redirect()->back();
    }

  
}
