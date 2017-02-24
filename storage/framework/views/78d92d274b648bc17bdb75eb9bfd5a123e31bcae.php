<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Lembur</div>
                <div class="panel-body">
    <?php echo Form::model($lembur,['method' => 'PATCH','route'=>['lembur.update',$lembur->id]]); ?>

    <div class="form-group <?php echo e($errors->has('jumlah_jam') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Jumlah jam', 'Jumlah Jam:'); ?>

        <?php echo Form::text('jumlah_jam',null,['class'=>'form-control']); ?>


                                <?php if($errors->has('jumlah_jam')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
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