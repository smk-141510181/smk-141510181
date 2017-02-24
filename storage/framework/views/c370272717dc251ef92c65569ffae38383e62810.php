<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Detail Lembur Pegawai</h3></div></center>
<br>
<table class="table table-striped table-bordered table-hover" border="3">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Lembur</th>
			<th>Nama Pegawai</th>
			<th>Foto</th>
			<th>Jumlah Jam</th>
			<th>Jumlah Uang Lembur</th>
			
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
			<td><img src="/assets/image/<?php echo e($a->Pegawai->photo); ?>" height="spx" width="100px" class="img-circle"></td>
			<td><?php echo e($a->KategoriLembur->besar_uang); ?> x <?php echo e($a->jumlah_jam); ?></td>
			<td><?php echo e($a->KategoriLembur->besar_uang*$a->jumlah_jam); ?> / Bulan </td>	

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
	</tbody>
</table>
<a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/lembur">Back</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>