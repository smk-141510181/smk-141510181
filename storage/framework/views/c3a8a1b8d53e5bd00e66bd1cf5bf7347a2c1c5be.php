<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Penggajian</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/penggajian')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                
                  <div class="col-md-12">
                                <label for="Jabatan">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="id_tunjangan_pegawai">
                                        <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datatunjangan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datatunjangan->id); ?>" ><?php echo e($datatunjangan->pegawai->User->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <span class="help-block">
                                        <?php echo e($errors->first('id_tunjangan_pegawai')); ?>

                                    </span>
                                    <div>
                                        <?php if(isset($error)): ?>
                                            HRD sudah Melakukan Penggajian Bulan Ini 
                                        <?php endif; ?>
                                    </div>
                            </div>
<br>
<br>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <br>
                            <body align="left">
                                <button type="submit" class="btn btn-primary">
                                    Buat Data
                                </button></body>
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

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>