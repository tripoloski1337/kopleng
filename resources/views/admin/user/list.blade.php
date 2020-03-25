@extends('layouts.dashboard')
@section('title')
List user
@stop
@section('content')
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Pengguna
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Akses</th>
                                            <th>Terlihat Terakhir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Akses</th>
                                            <th>Terlihat Terakhir</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($data as $data)
                                    	<?php if( $data->user == '1' ) { $level = 'admin'; }else { $level = 'kasir'; }  ?>
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $level }}</td>
                                            <td>{{ $data->updated_at }}</td>
                                            <td>
                                            	<a href="/user/delete/{{ $data->id }}" class="btn btn-danger">Hapus</a>
                                            	<a href="" class="btn btn-warning">Ubah</a>
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