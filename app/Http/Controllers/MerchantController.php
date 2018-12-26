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
        return view('admin.merchant.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
