<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<h3>Data Golongan</h3>

<a href="<?php echo e(route('golongan.create')); ?>" class="btn btn-primary">Buat Data Golongan</a>
<br><br>
<table class="table table-striped table-bordered table-hover border="3">
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
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($id++); ?></td>
			<td><?php echo e($a->kode_golongan); ?></td>
			<td><?php echo e($a->nama_golongan); ?></td>
			<td>Rp.<?php echo e($a->besar_uang); ?></td>			
				<td>
					<form method="POST" action="<?php echo e(route('golongan.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('golongan.edit',$a->id)); ?>" type="submit" button type="button" class="btn btn-warning">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-danger" value="Hapus">
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
</table>
<center><a href="<?php echo e(url('home')); ?>"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>