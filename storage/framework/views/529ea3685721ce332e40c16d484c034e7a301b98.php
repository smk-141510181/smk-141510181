<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<h3>Data Pegawai</h3>

<a href="<?php echo e(route('pegawai.create')); ?>"><button class="btn btn-flat"> Buat Data Pegawai</a></button>
<br><br>
<table class="table table=striped" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>nip</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Golongan</th>
			<th>Foto</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($id++); ?></td>
			<td><?php echo e($a->nip); ?></td>
			<td><?php echo e($a->User->name); ?></td>
			<td><?php echo e($a->Jabatan->nama_jabatan); ?></td>
			<td><?php echo e($a->Golongan->nama_golongan); ?></td>
			<td><img src="/assets/image/<?php echo e($a->poto); ?>" height="100px" width="100px"></td>
			
				<td>
					<form method="POST" action="<?php echo e(route('pegawai.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('pegawai.edit',$a->id)); ?>" type="submit" button type="button" class="btn-flat yellow">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat" value="Hapus">
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
</table>
<center><a href="<?php echo e(url('home')); ?>"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>