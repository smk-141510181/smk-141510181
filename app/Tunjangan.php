<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    protected $table='tunjangan';
    protected $fillable=['id','kode_tunjangan','id_golongan','id_jabatan','status','jumlah_anak','besar_tunjangan'];
    protected $visible=['id','kode_tunjangan','id_golongan','id_jabatan','status','jumlah_anak','besar_tunjangan'];
    public $timestamps=true;

    public function Golongan(){
    	return $this->belongsTo('App\Golongan','id_golongan');
    }
    public function Jabatan(){
    	return $this->belongsTo('App\Jabatan','id_jabatan');
    }
    public function PegawaiTunjangan()
    {
        return $this->hasMany('App\PegawaiTunjangan','id_tunjangan');
}
}
