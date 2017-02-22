<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Jabatan;
use App\Golongan;
class Pegawai extends Model
{
    protected $table='pegawai';
    protected $fillable=['id','nip','id_user','id_jabatan','id_golongan',
    'poto'];
    protected $visible=['id','nip','id_user','id_jabatan','id_golongan',
    'poto'];
    public $timestamps=true;


      public function User()
    {
    	return $this->belongsTo('App\User','id_user');
    }
      public function Jabatan()
    {
    	return $this->belongsTo('App\Jabatan','id_jabatan');
    }
      public function Golongan()
    {
    	return $this->belongsTo('App\Golongan','id_golongan');
    }
     public function LemburPegawai()
    {
        return $this->hasMany('App\LemburPegawai','id_pegawai');
    }
}
