<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriLembur extends Model
{
    protected $table='kategorilembur';
    protected $fillable=['id','kode_lembur','id_jabatan','id_golongan','besar_uang'];
    protected $visible=['id','kode_lembur','id_jabatan','id_golongan','besar_uang'];
    public $timestamps=true;

    public function Jabatan(){
    	return $this->belongsTo('App\Jabatan','id_jabatan');
    }
    public function Golongan(){
    	return $this->belongsTo('App\Golongan','id_golongan');
    }

    public function LemburPegawai(){
        return $this->hasMany('App\LemburPegawai','id_lembur');
    }
}	
