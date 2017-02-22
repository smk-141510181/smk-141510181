<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Lembur Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/lembur')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                

                        <div class="form-group<?php echo e($errors->has('id_lembur') ? ' has-error' : ''); ?>">
                            <label for="id_lembur" class="col-md-4 control-label">Kode Lembur</label>

                            <div class="col-md-6">
                                <select  name="id_lembur" class="form-control">
                                   <option value="">Silahkan Pilih Kode Lembur</option>
                                        <?php $__currentLoopData = $lembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>"><?php echo $a->kode_lembur; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_lembur')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                          <div class="form-group<?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
                            <label for="id_pegawai" class="col-md-4 control-label">NIP Pegawai</label>

                            <div class="col-md-6">
                                   <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih NIP pegawai</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>"><?php echo $a->nip; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_pegawai')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_pegawai')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                                                <div class="form-group<?php echo e($errors->has('jumlah_jam') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Jumlah Jam</label>

                            <div class="col-md-6">
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" value="<?php echo e(old('jumlah_jam')); ?>">

                                

                                <?php if($errors->has('jumlah_jam')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>
</div>
{<?php echo Form::close(); ?>}

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>