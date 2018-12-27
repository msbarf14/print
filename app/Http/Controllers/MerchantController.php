<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $merchant = Merchant::all();
        return view('admin.merchant.index', compact('merchant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);
        $merchant = [
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi
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
        $merchant = Merchant::find($id);

        // return $merchant;
        return view("admin.merchant.form", compact('merchant'));
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
