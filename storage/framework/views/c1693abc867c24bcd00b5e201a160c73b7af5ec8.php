<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-16">
			
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Pegawai</h3></div></center>
<div align="left"> <a href="<?php echo e(route('pegawai.create')); ?>" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
</div>
<br>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>nip</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Permission</th>
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
			<td><?php echo e($a->User->email); ?></td>
			<td><?php echo e($a->User->permission); ?></td>
			<td><?php echo e($a->Jabatan->nama_jabatan); ?></td>
			<td><?php echo e($a->Golongan->nama_golongan); ?></td>
			<td> 
			<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Lihat Foto <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    </li>                  
                     </a><img src="/assets/image/<?php echo e($a->poto); ?>" height="spx" width="500px">
            </td>
			
			<td>
					<form method="POST" action="<?php echo e(route('pegawai.destroy',$a->id)); ?>" accept-charset="UTF-8">
					<input name="_method" type="hidden"  value="DELETE">
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a href="<?php echo e(route('pegawai.edit',$a->id)); ?>" type="submit" button type="button" class="btn btn-flat yellow darken-2 waves-effect waves-light white-text">Edit</a>
					<input onclick="return confirm('Yakin Hapus ')" type="submit" button type="button" class="btn btn-flat red darken-10 waves-effect waves-light white-text" value="Hapus">
				
			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</td>
		</tr>
	</tbody>
</table>
<center><a href="<?php echo e(url('home')); ?>"><button class="btn btn-flat"> <font color="black">Menu Utama</a></button></font>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>