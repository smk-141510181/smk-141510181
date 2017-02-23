<?php $__env->startSection('content'); ?>
<style type="text/css">
    td,th{
        text-align: center ;
    }
    img{
        border-image-repeat: 3px ;
        border-style: circle ;
    }
</style>
       <div class="col-md-12">
                        <a href="<?php echo e(url('penggjian/create')); ?>" class="btn btn-primary form-control">Tambah Data</a>
                        
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        
                        <div class="col-md-12">
                        <center>
                            <p><img width="120px" height="100px" src="<?php echo url('assets/image/') ?>/<?php echo $datapenggajian->tunjangan_pegawai->pegawai->poto; ?>" class="img-circle" alt="Cinque Terre" ></p>

                        <h3><?php echo e($datapenggajian->tunjangan_pegawai->pegawai->User->name); ?></h3>
                        <h4><?php echo e($datapenggajian->tunjangan_pegawai->pegawai->nip); ?></h4>
                        <b><?php if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                        <?php elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                        <?php else: ?>
                            Gaji Sudah Diambil Pada <?php echo e($datapenggajian->tanggal_pengambilan); ?>

                        <?php endif; ?></b>
                        <h5>Gaji Lembur Sebesar Rp.<?php echo e($datapenggajian->jumlah_uang_lembur); ?> ,Gaji Pokok Sebesar Rp.<?php echo e($datapenggajian->gaji_pokok); ?> ,Mendapat Tunjangan Sebesar Rp.<?php echo e($datapenggajian->tunjangan_pegawai->tunjangan->besar_uang); ?> ,Jadi Total Gaji Rp.<?php echo e($datapenggajian->gaji_total); ?>




                        </h5>
                        
                                <a class="btn btn-primary col-md-12" href="<?php echo e(url('penggjian')); ?>">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>