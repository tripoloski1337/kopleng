<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\komposisi as compose;
use App\bahan;
use App\item;
use Auth;
use Input;
use DB;

class komposisi extends Controller
{
    public function formTambah($data)
    {
        $x = item::where('id_item',$data)->first();
        $y = bahan::all();
        return view('admin/komposisi/formAdd')->with('id',$x)->with('data',$y);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $x = DB::table('komposisi')->join('bahan','komposisi.id_bahan','=','bahan.id_bahan')->join('item','item.id_item','=','komposisi.id_item')->where('komposisi.id_item',$id)->get();
        $info = item::where('id_item',$id)->first();
        return view('admin/komposisi/list')->with('data',$x)->with('info',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $x = compose::create([
            'id_item'   =>  Input::get('id_item'),
            'id_bahan'  =>  Input::get('bahan'),
            'banyak_penggunaan'  =>  Input::get('banyak')
        ]);
        return redirect('/komposisi/list/'.Input::get('id_item'))->with('id_item',Input::get('id_item'));
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
        $x = compose::where('id_komposisi',$id)->delete();
        return redirect()->back();
    }
}
