@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Golongan</div>
                <div class="panel-body">
    {!! Form::model($gol,['method' => 'PATCH','route'=>['golongan.update',$gol->id]]) !!}
    <div class="form-group {{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Golongan', 'Kode Golongan:') !!}
        {!! Form::text('kode_golongan',null,['class'=>'form-control']) !!}

                                @if ($errors->has('kode_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group {{ $errors->has('nama_golongan') ? ' has-error' : '' }}">
        {!! Form::label('Nama Golongan', 'Nama Golongan:') !!}
        {!! Form::text('nama_golongan',null,['class'=>'form-control']) !!}
        @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
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
        {!! Form::submit('update', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}
@stop