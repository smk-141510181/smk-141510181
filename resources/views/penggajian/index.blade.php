@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Penggajian</h3></div></center>
<div align="left"> <a href="{{route('penggajian.create')}}" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br>
<div class="panel-body">
	<tbody>
		@php
		$id=1;
		@endphp
		@foreach($penggajian as $a)
		<tr>
		<h1><center>Penggajian Karyawan {{$a->PegawaiTunjangan->Pegawai->user->name}}</h1>
					<center><img src="/assets/image/{{ $a->PegawaiTunjangan->Pegawai->poto }}" height="spx" width="200px"></center>
			<center><h2>Besar Tunjangan Anda Adalah {{$a->PegawaiTunjangan->Tunjangan->besar_tunjangan}}<br> Sudah Melakukan Lembur Sebanyak {{$a->jumlah_jam_lembur}} Jam <br>Total Jumlah Uang Lembur Anda Adalah {{$a->jumlah_uang_lembur}}<br> Gaji Pokok = Jabatan Anda + Golongan Jadi Total Gaji Pokok Anda Adalah Rp.{{$a->gaji_pokok}} <br> Total Gaji Uang Lembur + Gaji Pokok + Besar Tunjangan Adalah Rp.{{$a->gaji_total}}<br> @if($a->tanggal_pengambilan == ""&&$a->status_pengambilan == "0")
                                    <br>
                                    Gaji Belum Diambil 
                                    <div >
                                    <a class="btn btn-primary " href="{{route('penggajian.edit',$a->id)}}">Ubah Pengambilan</a>
                                    </div>
                                    @elseif($a->tanggal_pengambilan == ""||$a->status_pengambilan == "0")
                                        Gaji Belum Diambil
                                        <div >
                                        <a class="btn btn-primary  " href="{{route('penggajian.edit',$a->id)}}">Ambil Gaji</a><input name="_method" type="hidden"  value="DELETE">
                                        <br>
                                    </div>
                                    @else
                                        Gaji Sudah Diambil Pada Tanggal {{$a->tanggal_pengambilan}}
                                    @endif
                                    <br>
                                    Penerima : {{$a->petugas_penerima}}
			
			</center>
			
			<br>
			                          
				<td>
				<center>
					<form method="POST" action="{{route('penggajian.destroy',$a->id)}}" accept-charset="UTF-8">
					<input  name="_token" type="hidden" value="{{csrf_token()}}">
					<input type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				</center>
				</td>
			</tr>
			@endforeach
		</div>
	</tbody>
</table>

@endsection