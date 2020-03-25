<?php $basedir = 'http://127.0.0.1:8000/' ?>
@extends('layouts.dashboard')
@section('title')
Penjualan
@stop
@section('content')
<?php
function buatrp($angka)
{
	$jadi = "Rp " . number_format($angka,2,',','.');
	return $jadi;
}
?>
<!-- JQuery DataTable Css -->
<link href="{{$basedir}}plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Penjualan
                            </h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Pemasukan</th>
                                            <th>Kasir</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Pemasukan</th>
                                            <th>Kasir</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($data as $data)
                                        <tr>
                                            <td>{{ buatrp($data->total_pembayaran) }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->date_pembayaran }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!-- Jquery DataTable Plugin Js -->
    <script src="{{ $basedir }}plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ $basedir }}plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="{{ $basedir }}/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="{{ $basedir }}/js/demo.js"></script>
@stop