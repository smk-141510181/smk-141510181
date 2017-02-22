<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Pengajian</h3></div></center>
<div align="left"> <a href="<?php echo e(route('penggajian.create')); ?>" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<div class="panel-body">
	<tbody>
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
		<h1>Penggajian <?php echo e($a->PegawaiTunjangan->Pegawai->user->name); ?></h1>
			<h2>Kode Tunjangan Anda Adalah <?php echo e($a->PegawaiTunjangan->Tunjangan->kode_tunjangan); ?> Sudah Melakukan Lembur Sebanyak <?php echo e($a->jumlah_jam_lembur); ?> Jam Jadi Total Juamlah Uang Lembur Anda Adalah <?php echo e($a->jumlah_uang_lembur); ?> Gaji Pokok = Jabatan Anda + Golongan Jadi Total Gaji Pokok Anda Adalah Rp.<?php echo e($a->gaji_pokok); ?> Jadi Total Gaji Uang Lembur + Gaji Pokok Adalah Rp.<?php echo e($a->gaji_total); ?> Tanggal Pengambilan <?php echo e($a->tanggal_pengambilan); ?> Status Pengambilan
			<?php echo e($a->status_pengambilan); ?> Penerima : <?php echo e($a->petugas_penerima); ?>

			<td></td>
			
			
				<td>
					<form method="POST" action="<?php echo e(route('penggajian.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>