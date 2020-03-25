<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\stock as banyak;
use App\bahan;
use Input;
use Auth;
use DB;

class stock extends Controller
{
    public function formTambah()
    {
        $data = bahan::all();
        return view('admin/stock/formAdd')->with('data',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = DB::table('stock')->join('bahan','bahan.id_bahan','=','stock.id_bahan')->join('users','users.id','=','stock.id_user')->get();
        return view('/admin/stock/list')->with('data',$x);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s = bahan::where('id_bahan',Input::get('bahan'))->first();
        $x = banyak::create([
            'id_bahan'      =>  Input::get('bahan'),
            'banyak_bahan'  =>  Input::get('banyak'),
            'id_user'       => Auth::user()->id
        ]);

        $alu = $s->banyak_bahan + Input::get('banyak'); 
        $data = ['banyak_bahan' =>  $alu];
        $u = bahan::where('id_bahan',Input::get('bahan'))->update($data);
        return redirect('/stock/list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
