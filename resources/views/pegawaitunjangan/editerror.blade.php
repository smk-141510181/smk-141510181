@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Tunjangan Pegawai</div>
                <div class="panel-body">
    {!! Form::model($tunjanganpegawai,['method'=>'PATCH','route'=>['pegawaitunjangan.update',$tunjanganpegawai->id]]) !!}
    <div class="form-group {{ $errors->has('id_tunjangan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Tunjangan', 'Kode Tunjangan:') !!}
        <select  name="id_tunjangan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Tunjangan</option>
                                        @foreach($tunjangan as $a)
                                        <option value="{!! $a->id !!}">Kode : {!! $a->kode_tunjangan !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_tunjangan') }}</strong>
                                    </span>
                                @endif
    </div><center><font color="black"> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maaf Jabatan Dan Golongan Tidak Sesuai Dengan Pegawai</label></font></center><br>
        <div class="form-group {{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
        {!! Form::label('Nama Pegawai', 'Nama Pegawai:') !!}
        <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih Nama pegawai</option>
                                        @foreach($pegawai as $a)
                                        <option value="{!! $a->id !!}">NIP : {!! $a->nip !!} Nama : {!! $a->user->name !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_pegawai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_pegawai') }}</strong>
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