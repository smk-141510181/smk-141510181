@extends('layouts.index')
@section('content')


<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-black">
				<div class="panel-heading"><h3>Data Admin</h3></div>
<br>
<a href="{{route('admin.create')}}"><button class="btn btn-flat"> Buat Data Login
<br>
<br>
</form>
<div class="panel-body">
	

<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th> User</th>
			<th>Email</th>
			<th>Password</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($user as $a)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$a->name}}</td>
			<td>{{$a->permission}}</td>
			<td>{{$a->email}}</td>
			<td>{{$a->password}}</td>			
				<td>
					<form method="POST" action="{{route('admin.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<a href="{{route('admin.edit',$a->id)}}" type="submit" button type="button" class="btn-flat yellow">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat" value="Hapus">
				</td>
			</tr>
			@endforeach
		
	</tbody>
	</div>
				</div>
		</div>
	</div>
</div>
</table>

<center><a href="{{url('home')}}"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
@endsection