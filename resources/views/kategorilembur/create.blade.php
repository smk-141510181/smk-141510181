@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Kategori Lembur</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/kategorilembur') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                
                        <div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Kode Kategori Lembur</label>

                            <div class="col-md-6">
                                <input id="kode_lembur" type="text" class="form-control" name="kode_lembur" value="{{ old('kode_lembur') }}">

                                <input id="permission" type="hidden" class="form-control" name="permission" value="pegawai">

                                @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                        <div class="form-group{{ $errors->has('id_jabatan') ? ' has-error' : '' }}">
                            <label for="id_jabatan" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
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
                        </div>
                          <div class="form-group{{ $errors->has('id_golongan') ? ' has-error' : '' }}">
                            <label for="id_golongan" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                                   <select  name="id_golongan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Golongan</option>
                                        @foreach($golongan as $a)
                                        <option value="{!! $a->id !!}">Kode : {!! $a->kode_golongan !!} Golongan {!! $a->nama_golongan !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                <div class="form-group{{ $errors->has('besar_uang') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Besar Uang</label>

                            <div class="col-md-6">
                                <input id="besar_uang" type="text" class="form-control" name="besar_uang" value="{{ old('besar_uang') }}">

                                <input id="permission" type="hidden" class="form-control" name="permission" value="pegawai">

                                @if ($errors->has('besar_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
</div>
            </div>
        </div>
    </div>
</div>
{{!! Form::close() !!}}

@endsection
