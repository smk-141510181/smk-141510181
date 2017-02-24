<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
	<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>		
				
<div class="card-panel black darken-3 white-text"><center><h3>Data Golongan</h3></div></center>
<div align="left"> <a href="<?php echo e(route('golongan.create')); ?>" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
</div>
<br>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Golongan</th>
			<th>Nama Golongan</th>
			<th>Besar Uang</th>
			<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
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
					
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('golongan.edit',$a->id)); ?>" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					 
                                  <a data-toggle="modal" href="#delete<?php echo e($a->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('golongan.destroy', $a->id),
                                    'model' => $a
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>