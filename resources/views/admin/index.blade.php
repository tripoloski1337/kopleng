@extends('layouts.dashboard')
@section('title')
Home
@stop
@section('content')
<?php
function buatrp($angka)
{
	$jadi = "Rp " . number_format($angka,2,',','.');
	return $jadi;
}
?>
<!-- Hover Zoom Effect -->
<?php
	$masukan = 0;
	foreach ($pemasukan as $data) {
		if ($data->date_pembayaran == date('Y-m-d')) 
		{
			$masukan = $masukan + $data->total_pembayaran;
		}else { }
	}
?>
            <div class="block-header">
                <h2>Informasi hari ini</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">money</i>
                        </div>
                        <div class="content">
                            <div class="text">Pemasukan</div>
                            <div class="number">{{ buatrp($masukan) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">arrow_upward</i>
                        </div>
                        <div class="content">
                            <div class="text">Penjualan</div>
                            <div class="number">{{ $penjualan }}x</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->
            <div class="block-header">
                <h2>Tentang system</h2>
            </div>
            <!-- Text Styles -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                e-cafe System
                                <small>system ini akan memantau laju penjualan , pemasukan dan pengeluaran dari keadi kopi kopleng</code></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <h1 class="header">
                                    Versi 0.0.0.1b
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop