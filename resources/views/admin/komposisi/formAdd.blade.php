@extends('layouts.dashboard')
@section('title')
Tambah komposisi
@stop
@section('content')
<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Komposisi untuk : {{ $id->nama_item }}
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['url' => '/komposisi/prosesadd', 'class' => 'form-horizontal']) !!}
                            <input type="text" hidden="hidden" value="{{ $id->id_item }}" name="id_item">
                                <div class="row clearfix">
                                	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Bahan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="bahan">
                                                    @foreach($data as $data)
                                                    <option value="{{ $data->id_bahan }}">{{ $data->nama_bahan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Banyak Bahan Digunakan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="banyak" placeholder="Masukan banyak bahan do gunakan">
                                            </div>
                                            <p>periksa satuan..</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value='Tambah'><br/><br/>
                                        <a href="/komposisi/list/{{ $id->id_item }}">Lihat Komposisi</a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
@stop