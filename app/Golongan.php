<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pegawai;
class Golongan extends Model
{
    
    protected $table='golongan';
    protected $fillable=['id','kode_golongan','nama_golongan','besar_uang'];
    protected $visible=['id','kode_golongan','nama_golongan','besar_uang'];
    public $timestamps=true;

      public function Pegawai(){
    	return $this->hasMany('App\Pegawai','id_golongan');
    }

     public function KategoriLembur(){
    	return $this->hasMany('App\KategoriLembur','id_golongan');
    }
     public function Tunjangan(){
        return $this->hasMany('App\Tunjangan','id_golongan');
    }
}
