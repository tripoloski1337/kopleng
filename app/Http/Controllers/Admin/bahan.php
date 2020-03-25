<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use App\bahan as things;
use App\stock;

class bahan extends Controller
{
    public function formTambah()
    {
        return view('admin/bahan/formAdd');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = things::all();
        return view('/admin/bahan/list')->with('data',$x); #->with('dat',$y);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exec = things::create([
            'nama_bahan'    =>  Input::get('nama'),
            'banyak_bahan'  =>  '0',
            'satuan'        =>  Input::get('satuan'),
            'id_user'       => Auth::user()->id
        ]);
        return redirect('/bahan/list');
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
        //hapus data pada tabel stock
        $id_bahan = things::where('id_bahan',$id)->first();
        $del = stock::where('id_bahan',$id)->delete();
        //hapus data pada tabel bahan
        $x = things::where('id_bahan',$id)->delete();
        return redirect()->back();
    }
}
