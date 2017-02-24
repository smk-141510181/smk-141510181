@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Tunjangan Pegawai</h3></div></center>
<div align="left"> <a href="{{route('tunjanganpegawai.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<div class="panel-body">
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Tunjangan</th>
			<th>Nama Pegawai</th>
			<th>Foto</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($pt as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->Tunjangan->kode_tunjangan}}</td>
			<td>{{$a->Pegawai->User->name}}</td>			
			<td><img src="/assets/image/{{ $a->Pegawai->photo }}" height="spx" width="100px"></td>
				
				<td>
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('tunjanganpegawai.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<a data-toggle="modal" href="#delete{{ $a->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('tunjanganpegawai.destroy', $a->id),
                                    'model' => $a
                                  ])
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>

@endsection