@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Detail Lembur Pegawai</h3></div></center>
<br>
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Lembur</th>
			<th>Nama Pegawai</th>
			<th>Foto</th>
			<th>Jumlah Jam</th>
			<th>Jumlah Uang Lembur</th>
			
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($lembur as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->KategoriLembur->kode_lembur}}</td>
			<td>{{$a->Pegawai->User->name}}</td>
			<td><img src="/assets/image/{{ $a->Pegawai->poto }}" height="spx" width="100px" class="img-circle"></td>
			<td>{{$a->KategoriLembur->besar_uang}} x {{$a->jumlah_jam}}</td>
			<td>{{$a->KategoriLembur->besar_uang*$a->jumlah_jam}} / Bulan </td>	

			</tr>
			@endforeach
		
	</tbody>
</table>
<a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/lembur">Back</a>

@endsection