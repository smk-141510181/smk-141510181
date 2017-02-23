<?php $__env->startSection('content'); ?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
               <center> <div class="panel-heading"><font face="Rockwell" size="5" color="black">
       <style>
   h1 {
     text-shadow: 5px -7px 7px #103636;

</style><h1 class="satu">Penggajian Karyawan</h1></div></center>

                
                <center>
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/golongan">Data Golongan</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/jabatan">Data Jabatan</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/pegawai">Data Pegawai</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/kategorilembur">Data Kategori Lembur</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/lembur">Data Lembur Pegawai</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/tunjangan">Data Tunjangan</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/tunjanganpegawai">Data Tunjangan Pegawai</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                    <a class="btn btn-flat black darken-4 waves-effect waves-light white-text" href="/penggajian">Data penggajian</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
            </font>
                </center>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>