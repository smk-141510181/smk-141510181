@extends('layouts.index')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Lembur</div>
                <div class="panel-body">
    {!! Form::model($lembur,['method' => 'PATCH','route'=>['lembur.update',$lembur->id]]) !!}
    <div class="form-group {{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
        {!! Form::label('Jumlah jam', 'Jumlah Jam:') !!}
        {!! Form::text('jumlah_jam',null,['class'=>'form-control']) !!}

                                @if ($errors->has('jumlah_jam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_jam') }}</strong>
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