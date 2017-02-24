@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-16">
			
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Pegawai</h3></div></center>
<div align="left"> <a href="{{route('pegawai.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
</div>
<br>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>nip</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Permission</th>
			<th>Jabatan</th>
			<th>Golongan</th>
			<th>Foto</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($pegawai as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->nip}}</td>
			<td>{{$a->User->name}}</td>
			<td>{{$a->User->email}}</td>
			<td>{{$a->User->permission}}</td>
			<td>{{$a->Jabatan->nama_jabatan}}</td>
			<td>{{$a->Golongan->nama_golongan}}</td>
			<td> 
			<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Lihat Foto <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    </li>                  
                     </a><img src="/assets/image/{{ $a->photo }}" height="spx" width="200px">
            </td>
			
			<td>
					
					<a href="{{route('pegawai.edit',$a->id)}}" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a data-toggle="modal" href="#delete{{ $a->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  @include('modals.delete', [
                                    'url' => route('pegawai.destroy', $a->id),
                                    'model' => $a
                                  ])
				
			
			@endforeach
		</td>
		</tr>
	</tbody>
</table>

@endsection