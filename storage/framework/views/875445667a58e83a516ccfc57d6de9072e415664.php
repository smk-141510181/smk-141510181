<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Tunjangan Pegawai</h3></div></center>
<div align="left"> <a href="<?php echo e(route('tunjanganpegawai.create')); ?>" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br><br>
<div class="panel-body">
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Tunjangan</th>
			<th>Nama Pegawai</th>
			<th>Foto</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
		</tr> 
	</thead>
	<tbody>
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $pt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($id++); ?></td>
			<td><?php echo e($a->Tunjangan->kode_tunjangan); ?></td>
			<td><?php echo e($a->Pegawai->User->name); ?></td>			
			<td><img src="/assets/image/<?php echo e($a->Pegawai->photo); ?>" height="spx" width="100px" class="img-circle"></td>
				
				<td>
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('tunjanganpegawai.edit',$a->id)); ?>" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<a data-toggle="modal" href="#delete<?php echo e($a->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('tunjanganpegawai.destroy', $a->id),
                                    'model' => $a
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>