@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Data Tunjangan</div>
                <div class="panel-body">
    {!! Form::model($tunjangan,['method'=>'PATCH','route'=>['tunjangan.update',$tunjangan->id]]) !!}
    <div class="form-group {{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
        {!! Form::label('Kode Tunajangan', 'Kode Tunjangan:') !!}
        {!! Form::text('kode_tunjangan',null,['class'=>'form-control']) !!}
        @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
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
       <div class="form-group {{ $errors->has('istatus') ? ' has-error' : '' }}">
       {!! Form::label('Status', 'Status:') !!} 
                                <select id="status" type="dropdown" class="form-control" name="status" value="{{ old('status') }}">
                                <option value="">Silahkan Pilih Status</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Tidak Menikah">Tidak Menikah</option>
                                <option value="Duda"> Duda</option>
                                <option value="Janda">Janda</option>
                                <option value="JOMBLO">JOMBLO</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
    <div class="form-group {{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
        {!! Form::label('Jumlah anak', 'Jumlah Anak:') !!}
        {!! Form::text('jumlah_anak',null,['class'=>'form-control']) !!}
        @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group {{ $errors->has('besar_tunjangan') ? ' has-error' : '' }}">
        {!! Form::label('Besar Tunjangan', 'Besar Tunjangan:') !!}
        {!! Form::text('besar_tunjangan',null,['class'=>'form-control']) !!}
        @if ($errors->has('besar_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_tunjangan') }}</strong>
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