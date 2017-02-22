@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Lembur Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/lembur') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                

                  
                          <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label">NIP Pegawai</label>

                            <div class="col-md-6">
                                   <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih NIP pegawai</option>
                                        @foreach($pegawai as $a)
                                        <option value="{!! $a->id !!}">NIP : {!! $a->nip !!} Nama :{!! $a->user->name !!}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('id_pegawai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_pegawai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                <div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Jumlah Jam</label>

                            <div class="col-md-6">
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" value="{{ old('jumlah_jam') }}">

                                

                                @if ($errors->has('jumlah_jam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_jam') }}</strong>
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
