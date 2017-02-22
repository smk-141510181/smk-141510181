<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Tunjangan Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/tunjanganpegawai')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                
                          <div class="form-group<?php echo e($errors->has('id_tunjangan') ? ' has-error' : ''); ?>">
                            <label for="id_tunjangan" class="col-md-4 control-label">Tunjangan</label>

                            <div class="col-md-6">
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
                        </div>
                        <center><font color="black"> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maaf Jabatan Dan Golongan Tidak Sesuai Dengan Pegawai</label></font></center><br>
                        <div class="form-group<?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
                            <label for="id_pegawai" class="col-md-4 control-label">Pegawai</label>

                            <div class="col-md-6">
                                   <select  name="id_pegawai" class="form-control">
                                   <option value="">Silahkan Pilih Nama Pegawai</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->User->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_pegawai')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_pegawai')); ?></strong>
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

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>