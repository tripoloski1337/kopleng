@extends('layouts.dashboard')
@section('title')
List Bahan
@stop
@section('content')
<?php
$data2 = DB::table('stock')->join('bahan','bahan.id_bahan','=','stock.id_bahan')->join('users','users.id','=','stock.id_user')->get();

?>
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Bahan
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stock</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stock</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $data->nama_bahan }}</td>
                                            <td>{{ $data->banyak_bahan }}</td>
                                            <td>{{ $data->satuan }}</td>
                                            <td>
                                                <a href="/bahan/delete/{{ $data->id_bahan }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->



<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Stock
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stock</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Stock</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data2 as $data)
                                        <tr>
                                            <td>{{ $data->nama_bahan }}</td>
                                            <td>{{ $data->banyak_bahan }}</td>
                                            <td>{{ $data->satuan }}</td>
                                            <td>
                                                <p>Tidak Tersedia</p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
@stop