<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Kategori Lembur</div>
                <div class="panel-body">
    <?php echo Form::model($kategori,['method'=>'PATCH','route'=>['kategorilembur.update',$kategori->id]]); ?>

    <div class="form-group <?php echo e($errors->has('kode_lembur') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Lembur', 'Kode Lembur:'); ?>

        <?php echo Form::text('kode_lembur',null,['class'=>'form-control']); ?>

        <?php if($errors->has('kode_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <div class="form-group <?php echo e($errors->has('id_jabatan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Jabatan', 'Kode Jabatan:'); ?>

        <select  name="id_jabatan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Jabatan</option>
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->kode_jabatan; ?> Jabatan : <?php echo $a->nama_jabatan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
        <div class="form-group <?php echo e($errors->has('id_golongan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Jabatan', 'Kode Jabatan:'); ?>

        <select  name="id_golongan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Jabatan</option>
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->kode_golongan; ?> Jabatan : <?php echo $a->nama_golongan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_golongan')); ?></strong>
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