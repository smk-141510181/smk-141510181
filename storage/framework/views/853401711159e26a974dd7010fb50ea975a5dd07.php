<?php $__env->startSection('content'); ?>


<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-black">
				<div class="panel-heading"><h3>Data Admin</h3></div>
<br>
<a href="<?php echo e(route('admin.create')); ?>"><button class="btn btn-flat"> Buat Data Login
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
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($id++); ?></td>
			<td><?php echo e($a->name); ?></td>
			<td><?php echo e($a->permission); ?></td>
			<td><?php echo e($a->email); ?></td>
			<td><?php echo e($a->password); ?></td>			
				<td>
					<form method="POST" action="<?php echo e(route('admin.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('admin.edit',$a->id)); ?>" type="submit" button type="button" class="btn-flat yellow">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat" value="Hapus">
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
	</div>
				</div>
		</div>
	</div>
</div>
</table>

<center><a href="<?php echo e(url('home')); ?>"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>