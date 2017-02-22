<?php $__env->startSection('js'); ?>
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Data Tunjangan</div>
                <div class="panel-body">
    <?php echo Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update',$pegawai->id],'enctype'=>'multipart/form-data']); ?>

    <div class="form-group <?php echo e($errors->has('nip') ? ' has-error' : ''); ?>">
        <?php echo Form::label('NIP', 'NIP:'); ?>

        <?php echo Form::text('nip',null,['class'=>'form-control']); ?>

        <?php if($errors->has('nip')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
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
       
    
    <div class="form-group <?php echo e($errors->has('poto') ? ' has-error' : ''); ?>">
        <?php echo Form::label('Foto', 'Besar Tunjangan:'); ?>

        <?php echo Form::file('poto',null,['class'=>'form-control']); ?>

        <?php if($errors->has('poto')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('poto')); ?></strong>
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