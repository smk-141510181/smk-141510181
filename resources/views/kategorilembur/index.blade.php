@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Kategori Lembur</h3></div></center>
<div align="left"> <a href="{{route('kategorilembur.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Lembur</th>
			<th>Nama Jabatan</th>
			<th>Nama Golongan</th>
			<th>Besar Uang</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($lembur as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->kode_lembur}}</td>
			<td>{{$a->Jabatan->nama_jabatan}}</td>
			<td>{{$a->Golongan->nama_golongan}}</td>
			<td>Rp.{{$a->besar_uang}}</td>
			
			
				<td>
					<form method="POST" action="{{route('kategorilembur.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('kategorilembur.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-textr" value="Hapus">
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>
@endsection