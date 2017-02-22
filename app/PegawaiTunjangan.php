<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiTunjangan extends Model
{
    protected $table ='pegawaitunjangan';
    protected $fisiblle=['id','id_pegawai','id_tunjangan'];
    protected $visible=['id','id_pegawai','id_tunjangan'];
    public $timestamps=true;

    public function Pegawai(){
    	return $this->belongsTo('App\Pegawai','id_pegawai');
    }
    public function Tunjangan(){
        return $this->belongsTo('App\Tunjangan','id_tunjangan');
    }
    public function Penggajian(){
        return $this->hasOne('App\Penggajian','id_tunjangan_pegawai');
    }
}
