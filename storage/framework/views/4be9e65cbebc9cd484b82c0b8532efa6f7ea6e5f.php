<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Data Tunjangan</div>
                <div class="panel-body">
    <?php echo Form::model($tunjangan,['method'=>'PATCH','route'=>['tunjangan.update',$tunjangan->id]]); ?>

    <div class="form-group <?php echo e($errors->has('kode_tunjangan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Kode Tunajangan', 'Kode Tunjangan:'); ?>

        <?php echo Form::text('kode_tunjangan',null,['class'=>'form-control']); ?>

        <?php if($errors->has('kode_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
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
       <div class="form-group <?php echo e($errors->has('istatus') ? ' has-error' : ''); ?>">
       <?php echo Form::label('Status', 'Status:'); ?> 
                                <select id="status" type="dropdown" class="form-control" name="status" value="<?php echo e(old('status')); ?>">
                                <option value="">Silahkan Pilih Status</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Tidak Menikah">Tidak Menikah</option>
                                <option value="Duda"> Duda</option>
                                <option value="Janda">Janda</option>
                                <option value="JOMBLO">JOMBLO</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
    <div class="form-group <?php echo e($errors->has('jumlah_anak') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Jumlah anak', 'Jumlah Anak:'); ?>

        <?php echo Form::text('jumlah_anak',null,['class'=>'form-control']); ?>

        <?php if($errors->has('jumlah_anak')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <div class="form-group <?php echo e($errors->has('besar_tunjangan') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Besar Tunjangan', 'Besar Tunjangan:'); ?>

        <?php echo Form::text('besar_tunjangan',null,['class'=>'form-control']); ?>

        <?php if($errors->has('besar_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_tunjangan')); ?></strong>
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