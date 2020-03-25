@extends('layouts.dashboard')
@section('title')
List item
@stop
@section('content')
<?php
function buatrp($angka)
{
	$jadi = "Rp " . number_format($angka,2,',','.');
	return $jadi;
}
?>
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List item
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Item</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Item</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td><a href="/komposisi/tambah/{{ $data->id_item }}">{{ $data->nama_item }}</a></td>
                                            <td>{{ buatrp($data->harga_item) }}</td>
                                            <td>
                                            	<a href="/item/delete/{{ $data->id_item }}" class="btn btn-danger">Hapus</a>
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