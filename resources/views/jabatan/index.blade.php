@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
				<div class="card-panel black darken-3 white-text"><center><h3>Data Jabatan</h3></div></center>
<div align="left"> <a href="{{route('jabatan.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
</div>
<br>
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Besar Uang</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($jabatan as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->kode_jabatan}}</td>
			<td>{{$a->nama_jabatan}}</td>
			<td>Rp.{{$a->besar_uang}}</td>			
				<td>
					<form method="POST" action="{{route('jabatan.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('jabatan.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-3 waves-effect waves-light white-text">Edit</a>
					<input type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				</td>
			</tr>
			@endforeach
		
	</tbody>
</table>
@endsection