@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Tunjangan Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjanganpegawai') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                
                          <div class="form-group{{ $errors->has('id_tunjangan') ? ' has-error' : '' }}">
                            <label for="id_tunjangan" class="col-md-4 control-label">Tunjangan</label>

                            <div class="col-md-6">
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
                            </div>
                        </div>
                        <center><font color="black"> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maaf Jabatan Dan Golongan Tidak Sesuai Dengan Pegawai</label></font></center><br>
                        <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label">Pegawai</label>

                            <div class="col-md-6">
                                   <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih Nama Pegawai</option>
                                        @foreach($pegawai as $a)
                                        <option value="{!! $a->id !!}">Kode : {!! $a->User->name !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_pegawai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_pegawai') }}</strong>
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
