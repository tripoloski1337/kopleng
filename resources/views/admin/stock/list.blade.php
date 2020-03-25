@extends('layouts.dashboard')
@section('title')
List Stock
@stop
@section('content')
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
                                        @foreach($data as $data)
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