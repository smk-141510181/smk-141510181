@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Tunjangan</h3></div></center>
<div align="left"> <a href="{{route('tunjangan.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<div class="panel-body">
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Tunjangan</th>
			<th>Nama Jabatan</th>
			<th>Nama Golongan</th>
			<th>Jumlah Anak</th>
			<th>Status</th>
			<th>Besar Tunjangan</th>
			<td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($tunjangan as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->kode_tunjangan}}</td>
			<td>{{$a->Jabatan->nama_jabatan}}</td>
			<td>{{$a->Golongan->nama_golongan}}</td>
			<td>{{$a->jumlah_anak}}</td>
			<td>{{$a->status}}</td>
			<td>Rp.{{$a->besar_tunjangan}}</td>
			
			
				<td>
					
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('tunjangan.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<a data-toggle="modal" href="#delete{{ $a->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('tunjangan.destroy', $a->id),
                                    'model' => $a
                                  ])
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>

@endsection