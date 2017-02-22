<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Tunjangan Pegawai</div>
                <div class="panel-body">
    <?php echo Form::model($tunjanganpegawai,['method'=>'PATCH','route'=>['tunjanganpegawai.update',$tunjanganpegawai->id]]); ?>

    <div class="form-group <?php echo e($errors->has('id_tunjangan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Tunjangan', 'Kode Tunjangan:'); ?>

        <select  name="id_tunjangan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Tunjangan</option>
                                        <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->kode_tunjangan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_tunjangan')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
        <div class="form-group <?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Nama Pegawai', 'Nama Pegawai:'); ?>

        <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih Nama pegawai</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">NIP : <?php echo $a->nip; ?> Nama : <?php echo $a->user->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_pegawai')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_pegawai')); ?></strong>
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