@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Lembur Pegawai</h3></div></center>
<div align="left"> <a href="{{route('lembur.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Lembur</th>
			<th>Nama Pegawai</th>
			<th>Jumlah Jam</th>
			<th>Jumlah Uang Lembur</th>
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
			<td>{{$a->KategoriLembur->kode_lembur}}</td>
			<td>{{$a->Pegawai->User->name}}</td>
			<td>{{$a->KategoriLembur->besar_uang}} x {{$a->jumlah_jam}}</td>
			<td>{{$a->KategoriLembur->besar_uang*$a->jumlah_jam}} / Hari </td>			
				<td>
					
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('lembur.edit',$a->id)}}" class='btn btn-warning'> Edit </a>
					<a data-toggle="modal" href="#delete{{ $a->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('kategorilembur.destroy', $a->id),
                                    'model' => $a
                                  ])
				</td>
			</tr>
			@endforeach
		
	</tbody>
</table>
<a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/index1">Detail Lembur</a>

@endsection