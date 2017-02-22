@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Kategori Lembur</div>
                <div class="panel-body">
    {!! Form::model($kategori,['method'=>'PATCH','route'=>['kategorilembur.update',$kategori->id]]) !!}
    <div class="form-group {{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
        {!! Form::label('Kode Lembur', 'Kode Lembur:') !!}
        {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
        @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group {{ $errors->has('id_jabatan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Jabatan', 'Kode Jabatan:') !!}
        <select  name="id_jabatan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Jabatan</option>
                                        @foreach($jabatan as $a)
                                        <option value="{!! $a->id !!}">Kode : {!! $a->kode_jabatan !!} Jabatan : {!! $a->nama_jabatan !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_jabatan') }}</strong>
                                    </span>
                                @endif
    </div>
        <div class="form-group {{ $errors->has('id_golongan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Jabatan', 'Kode Jabatan:') !!}
        <select  name="id_golongan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Jabatan</option>
                                        @foreach($golongan as $a)
                                        <option value="{!! $a->id !!}">Kode : {!! $a->kode_golongan !!} Jabatan : {!! $a->nama_golongan !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_golongan') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group {{ $errors->has('besar_uang') ? ' has-error' : '' }}">
        {!! Form::label('Besar Uang', 'Besar Uang:') !!}
        {!! Form::text('besar_uang',null,['class'=>'form-control']) !!}
        @if ($errors->has('besar_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_uang') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}
@stop