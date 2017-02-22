<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Golongan</div>
                <div class="panel-body">
    <?php echo Form::model($gol,['method' => 'PATCH','route'=>['golongan.update',$gol->id]]); ?>

    <div class="form-group <?php echo e($errors->has('kode_golongan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Golongan', 'Kode Golongan:'); ?>

        <?php echo Form::text('kode_golongan',null,['class'=>'form-control']); ?>


                                <?php if($errors->has('kode_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <div class="form-group <?php echo e($errors->has('nama_golongan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Nama Golongan', 'Nama Golongan:'); ?>

        <?php echo Form::text('nama_golongan',null,['class'=>'form-control']); ?>

        <?php if($errors->has('nama_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <div class="form-group <?php echo e($errors->has('besar_uang') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Besar Uang', 'Besar Uang:'); ?>

        <?php echo Form::text('besar_uang',null,['class'=>'form-control']); ?>

        <?php if($errors->has('besar_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <div class="form-group">
        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>