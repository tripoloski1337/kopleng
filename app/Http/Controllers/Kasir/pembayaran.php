<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pembayaran as payment;
use App\transaksi;
use App\bahan;
use App\chart;
use Input;
use Auth;
use DB;
class pembayaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chart = DB::table('chart')->join('users','chart.id_user','=','users.id')->join('item','item.id_item','=','chart.id_item')->where('chart.status','null')->get();
            $total = 0;
            $count = 0;
            foreach ($chart as $data) {
                $count = $data->banyak_beli;
                $total = $total + ($data->harga_item * $count ); 
            }
        $uang_bayar = Input::get('uang_bayar');
        $x = payment::create([
            'id_user'   =>  Auth::user()->id,
            'total_pembayaran'  =>  $total,
            'uang_bayar'    =>  Input::get('uang_bayar'),
            'date_pembayaran'   =>  date('Y-m-d')
        ]);
//        echo 'total : '.$total.'<br/>';
//        echo 'uang bayar : '.$uang_bayar.'<br/>';
        if ($uang_bayar > $total) 
        {
            $kembalian = $uang_bayar - $total;
            $pembayaran = ['kembalian' => $kembalian,'uang_bayar' => $uang_bayar,'total_pembayaran' => $total];
//            echo 'kembalian : ' . $kembalian;
        }else{   $pembayaran = ['uang_bayar' => $uang_bayar,'total_pembayaran' => $total];   }
        $update = chart::where('status','null')->update(['status' => 'paid']);
        return view('/cashier/bond/print')->with('data',$chart)->with('pembayaran',$pembayaran);
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
