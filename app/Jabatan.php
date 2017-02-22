<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pegawai;
class Jabatan extends Model
{
      protected $table='jabatan';
    protected $fillable=['id','kode_jabatan','nama_jabatan','besar_uang'];
    protected $visible=['id','kode_jabatan','nama_jabatan','besar_uang'];
    public $timestamps=true;

    public function Pegawai(){
    	return $this->hasMany('App\Pegawai','id_jabatan');
    }
    public function KategoriLembur(){
    	return $this->hasMany('App\KategoriLembur','id_jabatan');
    }
    public function Tunjangan(){
        return $this->hasMany('App\Tunjangan','id_jabatan');
    }
}
