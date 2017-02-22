@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Pengajian</h3></div></center>
<div align="left"> <a href="{{route('penggajian.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<div class="panel-body">
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($penggajian as $a)
		<tr>
		<h1>Penggajian {{$a->PegawaiTunjangan->Pegawai->user->name}}</h1>
			<h2>Kode Tunjangan Anda Adalah {{$a->PegawaiTunjangan->Tunjangan->kode_tunjangan}} Sudah Melakukan Lembur Sebanyak {{$a->jumlah_jam_lembur}} Jam Jadi Total Juamlah Uang Lembur Anda Adalah {{$a->jumlah_uang_lembur}} Gaji Pokok = Jabatan Anda + Golongan Jadi Total Gaji Pokok Anda Adalah Rp.{{$a->gaji_pokok}} Jadi Total Gaji Uang Lembur + Gaji Pokok Adalah Rp.{{$a->gaji_total}} Tanggal Pengambilan {{$a->tanggal_pengambilan}} Status Pengambilan
			{{$a->status_pengambilan}} Penerima : {{$a->petugas_penerima}}
			<td></td>
			
			
				<td>
					<form method="POST" action="{{route('penggajian.destroy',$a->id)}}" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>

@endsection