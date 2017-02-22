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
				<td>
					<form method="POST" action="{{route('tunjanganpegawai.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('tunjanganpegawai.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>

@endsection