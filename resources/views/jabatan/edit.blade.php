@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update jabatan</div>
                <div class="panel-body">
    {!! Form::model($jab,['method' => 'PATCH','route'=>['jabatan.update',$jab->id]]) !!}
    <div class="form-group {{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Jabatan', 'Kode Jabatan:') !!}
        {!! Form::text('kode_jabatan',null,['class'=>'form-control']) !!}

                                @if ($errors->has('kode_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group {{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
        {!! Form::label('Nama Jabatan', 'Nama Jabatan:') !!}
        {!! Form::text('nama_jabatan',null,['class'=>'form-control']) !!}
        @if ($errors->has('nama_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_jabatan') }}</strong>
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