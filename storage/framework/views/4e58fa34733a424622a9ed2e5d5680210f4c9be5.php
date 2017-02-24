<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-heading">
				<div class="panel-heading">
<div class="card-panel black darken-3 white-text"><center><h3>Data Penggajian</h3></div></center>
<div align="left"> <a href="<?php echo e(route('penggajian.create')); ?>" class="btn btn-flat black darken-4 waves-effect waves-light white-text glyphicon glyphicon-plus"></a>
<br>
<div class="panel-body">
	<tbody>
		<?php 
		$id=1;
		 ?>
		<?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
		<h1><center>Penggajian Karyawan <?php echo e($a->PegawaiTunjangan->Pegawai->user->name); ?></h1>
					<center><img src="/assets/image/<?php echo e($a->PegawaiTunjangan->Pegawai->poto); ?>" height="spx" width="200px" class="img-circle"></center>
			<center><h2>Besar Tunjangan Anda Adalah <?php echo e($a->PegawaiTunjangan->Tunjangan->besar_tunjangan); ?><br> Sudah Melakukan Lembur Sebanyak <?php echo e($a->jumlah_jam_lembur); ?> Jam <br>Total Jumlah Uang Lembur Anda Adalah <?php echo e($a->jumlah_uang_lembur); ?><br> Gaji Pokok = Jabatan Anda + Golongan Jadi Total Gaji Pokok Anda Adalah Rp.<?php echo e($a->gaji_pokok); ?> <br> Total Gaji Uang Lembur + Gaji Pokok + Besar Tunjangan Adalah Rp.<?php echo e($a->gaji_total); ?><br> <?php if($a->tanggal_pengambilan == ""&&$a->status_pengambilan == "0"): ?>
                                    <br>
                                    Gaji Belum Diambil 
                                    <div >
                                    <a class="btn btn-primary " href="<?php echo e(route('penggajian.edit',$a->id)); ?>">Ambil Gaji</a>
                                    </div>
                                    <?php elseif($a->tanggal_pengambilan == ""||$a->status_pengambilan == "0"): ?>
                                        Gaji Belum Diambil
                                        <div >
                                        <a class="btn btn-primary  " href="<?php echo e(route('penggajian.edit',$a->id)); ?>">Ambil Gaji</a><input name="_method" type="hidden"  value="DELETE">
                                        <br>
                                    </div>
                                    <?php else: ?>
                                        Gaji Sudah Diambil Pada Tanggal <?php echo e($a->tanggal_pengambilan); ?>

                                    <?php endif; ?>
                                    <br>
                                    Penerima : <?php echo e($a->petugas_penerima); ?>

			
			</center>
			
			
			                          
				<td>
				<center>
					
					<input  name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
					<a data-toggle="modal" href="#delete<?php echo e($a->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"></i>Hapus</a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('penggajian.destroy', $a->id),
                                    'model' => $a
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                  <br><br><br><br><br><br>
				</center>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>