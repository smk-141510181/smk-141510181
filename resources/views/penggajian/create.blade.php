@extends('layouts.index')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Penggajian</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/penggajian') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                
                  <div class="col-md-12">
                                <label for="Jabatan">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="id_tunjangan_pegawai">
                                        @foreach($tunjangan as $datatunjangan)
                                            <option  value="{{$datatunjangan->id}}" >{{$datatunjangan->pegawai->User->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        {{$errors->first('id_tunjangan_pegawai')}}
                                    </span>
                                    <div>
                                        @if(isset($error))
                                            HRD sudah Melakukan Penggajian Bulan Ini 
                                        @endif
                                    </div>
                            </div>
<br>
<br>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <br>
                            <body align="left">
                                <button type="submit" class="btn btn-primary">
                                    Buat Data
                                </button></body>
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
