@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Kategori Lembur</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjangan') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                
                        <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Kode Tunjangan</label>

                            <div class="col-md-6">
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="{{ old('kode_tunjangan') }}">

                                <input id="permission" type="hidden" class="form-control" name="permission" value="pegawai">

                                @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
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
                                        <option value="{!! $a->id !!}">Kode : {!! $a->kode_golongan !!} Nama : {!! $a->nama_golongan !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
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
                        </div>
                            <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Jumlah Anak</label>

                            <div class="col-md-6">
                                <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" value="{{ old('jumlah_anak') }}">

                                @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('besar_tunjangan') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Besar Tunjangan</label>

                            <div class="col-md-6">
                                <input id="besar_tunjangan" type="text" class="form-control" name="besar_tunjangan" value="{{ old('besar_tunjangan') }}">

                                @if ($errors->has('besar_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_tunjangan') }}</strong>
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
