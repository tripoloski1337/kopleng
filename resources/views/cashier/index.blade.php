@extends('layouts.kasir')
@section('title')
{{ Auth::user()->name }}@kopleng
@stop
@section('content')
<?php
function buatrp($angka)
{
	$jadi = "Rp " . number_format($angka,2,',','.');
	return $jadi;
}
?>
<?php
$chart = DB::table('chart')->join('users','chart.id_user','=','users.id')->join('item','item.id_item','=','chart.id_item')->where('chart.status','null')->get();
?>
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Form Pembelian
                            </h2>
                        </div>
                        <div class="body">
                        	{!! Form::open(['url' => '/chart/prosesadd', 'class' => 'form-horizontal']) !!}
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                   <label for="email_address_2">Nama Bahan</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="bahan">
                                                @foreach($data as $data)
                                                <option value="{{ $data->id_item }}">{{ $data->nama_item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                   <label for="email_address_2">Jumlah Beli</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="banyak">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value='Tambah!'>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                	<div class="card">
                		<div class="header">
                			<h2>Total</h2>
                		</div>
                		<div class="body">
                			<div class="row clearfix">
                				<h1>
                					<?php if (empty($total)){ echo 'Rp. 0'; }else{ ?>
                					{{ buatrp($total) }}
                					<?php }?>
                				</h1>
                				<br/>
                				{!! Form::open(['url' => '/kasir/bayar']) !!}
                				<input type="number" class="form-control" name="uang_bayar" placeholder="Masukan uang bayar disini"><br/>
                				<button class="btn btn-block btn-primary">Bayar!</button>
                				{!! Form::close() !!}
                			</div>
                		</div>
                	</div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                	<div class="card">
                		<div class="header">
                			<h2>List Barang</h2>
                		</div>
                		<div class="body">
                			<div class="row clearfix">
                				<div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Item</th>
                                            <th>Banyak</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Item</th>
                                            <th>Banyak</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                  		
                                    	<?php if(!empty($data)){ ?>
                                    	@foreach($chart as $data)
                                  		<tr>
                                  			<td>{{ $data->nama_item }}</td>
                                  			<td>{{ $data->banyak_beli }}</td>
                                  			<td>{{ buatrp($data->harga_item) }}</td>
                                  			<td><a class="btn btn-xs btn-danger" href="/chart/delete/{{ $data->id_chart }}">Delete</a></td>
                                  		</tr>
                                  		@endforeach
                                  		<?php }?>
                                    </tbody>
                                </table>
                            </div>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
@stop