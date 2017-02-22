<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table='penggajian';
    protected $filablle=['id','id_tunjangan_pegawai','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','petugas_penerima'];
    public $timestamps=true;

    public function PegawaiTunjangan(){
        return $this->belongsTo('App\PegawaiTunjangan','id_tunjangan_pegawai');
    }

}
