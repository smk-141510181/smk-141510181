<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Data Kategori Lembur</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/tunjangan')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                
                        <div class="form-group<?php echo e($errors->has('kode_tunjangan') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Kode Tunjangan</label>

                            <div class="col-md-6">
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="<?php echo e(old('kode_tunjangan')); ?>">

                                <input id="permission" type="hidden" class="form-control" name="permission" value="pegawai">

                                <?php if($errors->has('kode_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                      
                        <div class="form-group<?php echo e($errors->has('id_jabatan') ? ' has-error' : ''); ?>">
                            <label for="id_jabatan" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <select  name="id_jabatan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Jabatan</option>
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->kode_jabatan; ?> Jabatan : <?php echo $a->kode_jabatan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                          <div class="form-group<?php echo e($errors->has('id_golongan') ? ' has-error' : ''); ?>">
                            <label for="id_golongan" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                                   <select  name="id_golongan" class="form-control">
                                   <option value="">Silahkan Pilih Kode Golongan</option>
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $a->id; ?>">Kode : <?php echo $a->kode_golongan; ?> Nama : <?php echo $a->kode_golongan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                <?php if($errors->has('id_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                                                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
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
                        </div>
                            <div class="form-group<?php echo e($errors->has('jumlah_anak') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Jumlah Anak</label>

                            <div class="col-md-6">
                                <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" value="<?php echo e(old('jumlah_anak')); ?>">

                                <?php if($errors->has('jumlah_anak')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('besar_tunjangan') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Besar Tunjangan</label>

                            <div class="col-md-6">
                                <input id="besar_tunjangan" type="text" class="form-control" name="besar_tunjangan" value="<?php echo e(old('besar_tunjangan')); ?>">

                                <?php if($errors->has('besar_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besar_tunjangan')); ?></strong>
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