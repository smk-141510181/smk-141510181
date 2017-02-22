<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-defauld">
				<div class="panel-heading">SMK ASSALAAM BANDUNG</div>
				<div class="panel-body">
					<h1>Update Data</h1>
					<hr>
					<?php echo Form::model($jab,['method'=>'PATCH','route'=>['jabatan.update',$jab->id]]); ?>

					<div class="form-group form-group-label">
						<div class="row">
						<div class="form-group<?php echo e($errors->has('kode_jabatan') ? ' has-error' : ''); ?>">
							<?php echo Form::label('Kode Jabatan','Kode Jabatan:'); ?>

							<?php echo Form::text('kode_jabatan',null,['class'=>'form-control']); ?>

 <?php if($errors->has('kode_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
						</div>

						</div>
						<div class="row">
						<div class="form-group<?php echo e($errors->has('nama_jabatan') ? ' has-error' : ''); ?>">
							<?php echo Form::label('Nama Jabatan','Nama Jabatan:'); ?>

							<?php echo Form::text('nama_jabatan',null,['class'=>'form-control']); ?>

 <?php if($errors->has('nama_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
						</div>
					</div>
							<div class="row">
						<div class="form-group<?php echo e($errors->has('besar_uang') ? ' has-error' : ''); ?>">
							<?php echo Form::label('Besar Uang','Besar Uang:'); ?>

							<?php echo Form::text('besar_uang',null,['class'=>'form-control']); ?>

 <?php if($errors->has('besar_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<?php echo Form::submit('Update',['class'=>'btn btn-primary']); ?>

</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>