<?php $basedir = 'http://127.0.0.1:8000/' ?>
@extends('layouts.dashboard')
@section('title')
List Komposisi
@stop
@section('content')
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Komposisi bahan untuk membuat {{ $info->nama_item }} 
                            </h2>
                        </div>
                        <div class="body">
                            <a href="{{ $basedir }}komposisi/tambah/{{ $info->id_item }}"><button class="btn btn-xs btn-primary"> Tambah</button></a>
                            <br/><br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Banyak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Banyak</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $data->nama_bahan }}</td>
                                            <td>{{ $data->banyak_penggunaan.$data->satuan }}</td>
                                            <td>
                                            	<a href="/komposisi/delete/{{ $data->id_komposisi }}" class="btn btn-danger">Hapus</a>
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