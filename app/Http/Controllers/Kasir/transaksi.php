<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item;
use App\stock;
use App\chart;
use Input;
use Auth;
use App\komposisi;
use App\bahan;
use DB;
use App\transaksi as tracsaction;

class transaksi extends Controller
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
        $x = chart::create([
                    'id_item'   => Input::get('bahan'),
                    'id_user'   =>  Auth::user()->id,
                    'banyak_beli'   =>  Input::get('banyak'),
                    'status'    =>  'null'
        ]);
        $komposisi = komposisi::where('id_item',Input::get('bahan'))->get();
        //pengurangan terhadap stock bahan
        foreach ($komposisi as $data) 
        {
            $counter = 0;
            //$stock = stock::where('id_bahan')->get();
            $bahan = bahan::where('id_bahan',$data->id_bahan)->get();
            foreach ($bahan as $x) {
                //$chart = chart::where('id_item',Input::get('bahan'))->first();
                //echo print_r($x);
                $counter = $x->banyak_bahan - ($data->banyak_penggunaan * Input::get('banyak'));   
                //echo "";
                //echo 'banyak bahan : '.$x->banyak_bahan.'<br/>';
                //echo 'banyak penggunaan :'.$data->banyak_penggunaan.'<br/>';
                echo 'total : '.$counter.'<br/>';
                $update = bahan::where('id_bahan',$data->id_bahan)->update(['banyak_bahan' => $counter]);
            }
            //$update = bahan::where('id_bahan',$data->id_bahan)->update(['banyak_bahan'],$counter);
        }
        /*
        $chart = DB::table('chart')->join('users','chart.id_user','=','users.id')->join('item','item.id_item','=','chart.id_item')->where('chart.status','null')->get();
        $total = 0;
        foreach ($chart as $data) {
            $total = $total + $data->harga_item; 
        }*/
        //$data = DB::table('chart')->join('users','chart.id_user','=','user.id')->join('item','item.id_item','=','chart.id_item')->where('chart.status','null')->get();
        return redirect('/');
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
        $counter = 0;
        $x = chart::join('komposisi','komposisi.id_item','=','chart.id_item')->where('chart.id_chart',$id)->get();
        foreach ($x as $data) {
            $pen = $data->data_penggunaan;
            $y = bahan::where('id_bahan',$data->id_bahan)->first();
          //  echo 'id_bahan : '.$data->id_bahan.'<br/>';
          //  echo 'banyak_penggunaan : '.$data->banyak_penggunaan."<br/>";
         //   echo 'banyak_bahan : '.$y->banyak_bahan.'<br/>';
            $counter = $y->banyak_bahan + ($data->banyak_penggunaan * $data->banyak_beli);
         //   echo 'counter : '.$counter.'<br/>';
            $update = bahan::where('id_bahan',$data->id_bahan)->update(['banyak_bahan' => $counter]);
        }
        //$counter =
        //echo $counter;
        $x = chart::where('id_chart',$id)->delete();
        return redirect()->back();
    }
}
