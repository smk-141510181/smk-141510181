@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop
@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Data Tunjangan</div>
                <div class="panel-body">
    {!! Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update',$pegawai->id],'enctype'=>'multipart/form-data']) !!}
    <div class="form-group {{ $errors->has('nip') ? ' has-error' : '' }}">
        {!! Form::label('NIP', 'NIP:') !!}
        {!! Form::text('nip',null,['class'=>'form-control']) !!}
        @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
                                <input id="name" type="text" class="form-control" name="name" value="{{ $pegawai->User->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group">
    {!! Form::label('Email', 'Email:') !!}
                                <input id="email" type="email" class="form-control" name="email" value="{{ $pegawai->User->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
    <div class="form-group">
                                {!! Form::label('Permission', 'Permission:') !!}
                                <input id="permission" type="text" class="form-control" name="permission" value="{{ $pegawai->User->permission }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
       
    
    <div class="form-group {{ $errors->has('poto') ? ' has-error' : '' }}">
        {!! Form::label('Foto', 'Foto:') !!}
        {!! Form::file('poto',null,['class'=>'form-control']) !!}
        @if ($errors->has('poto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poto') }}</strong>
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