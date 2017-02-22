@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
	<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>		
				
<div class="card-panel black darken-3 white-text"><center><h3>Data Golongan</h3></div></center>
<div align="left"> <a href="{{route('golongan.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
</div>
<br>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Golongan</th>
			<th>Nama Golongan</th>
			<th>Besar Uang</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($golongan as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->kode_golongan}}</td>
			<td>{{$a->nama_golongan}}</td>
			<td>Rp.{{$a->besar_uang}}</td>			
				<td>
					<form method="POST" action="{{route('golongan.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('golongan.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-textr" value="Hapus">
				</td>
			</tr>
			@endforeach
		
	</tbody>
</table>

@endsection