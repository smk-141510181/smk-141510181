@extends('layouts.index')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Golongan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/golongan') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
                            <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan</label>

                            <div class="col-md-6">
                                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" value="{{ old('kode_golongan') }}">

                                @if ($errors->has('kode_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : '' }}">
                            <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan</label>

                            <div class="col-md-6">
                                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan" value="{{ old('nama_golongan') }}">

                                @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                           <div class="form-group{{ $errors->has('besar_uang') ? ' has-error' : '' }}">
                            <label for="besar_uang" class="col-md-4 control-label">Besar Uang</label>

                            <div class="col-md-6">
                                <input id="besar_uang" type="text" class="form-control" name="besar_uang" value="{{ old('besar_uang') }}">

                                @if ($errors->has('besar_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-flat blue darken-4 waves-effect waves-light white-text">
                                    Buat Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
