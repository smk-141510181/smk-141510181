<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<h3>Data Lembur Golongan</h3>

<a href="<?php echo e(route('lembur.create')); ?>"><button class="btn btn-flat"> Buat Data Lembur Pegawai</a></button>
<br><br>
<table class="table table=striped" border="3">
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
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($id++); ?></td>
			<td><?php echo e($a->KategoriLembur->kode_lembur); ?></td>
			<td><?php echo e($a->Pegawai->User->name); ?></td>
			<td><?php echo e($a->jumlah_jam); ?></td>
			<td><?php echo e($a->KategoriLembur->besar_uang*$a->jumlah_jam); ?></td>			
				<td>
					<form method="POST" action="<?php echo e(route('lembur.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('lembur.edit',$a->id)); ?>" type="submit" button type="button" class="btn-flat yellow">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat" value="Hapus">
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
</table>
<center><a href="<?php echo e(url('home')); ?>"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>