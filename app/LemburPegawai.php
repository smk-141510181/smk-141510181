<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LemburPegawai extends Model
{
    protected $table='pegawainulembur';
    protected $fillable=['id','id_lembur','id_pegawai','jumlah_jam'];
    protected $visible=['id','id_lembur','id_pegawai','jumlah_jam'];
    public $timestamps=true;

    public function KategoriLembur(){
    	return $this->belongsTo('App\KategoriLembur','id_lembur');
    }
    public function Pegawai(){
    	return $this->belongsTo('App\Pegawai','id_pegawai');
    }
}
