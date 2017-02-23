<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian ;
use App\PegawaiTunjangan ;
use App\Pegawai ;
use App\Tunjangan ;
use App\Jabatan ;
use App\Golongan;
use App\KategoriLembur ;
use App\LemburPegawai ;
use Input ;
use Validator ;
use auth ;
class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $penggajian=Penggajian::all();
        // dd($penggajian);
         return view('penggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tunjangan=PegawaiTunjangan::paginate(10);
        return view('penggajian.create',compact('tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian=Input::all();
         // dd($penggajian);
        $where=PegawaiTunjangan::where('id',$penggajian['id_tunjangan_pegawai'])->first();
        // dd($where); 
        $wherepenggajian=Penggajian::where('id_tunjangan_pegawai',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=Tunjangan::where('id',$where->id_tunjangan)->first();
        // dd($wheretunjangan);
        $wherepegawai=Pegawai::where('id',$where->id_pegawai)->first();
        // dd($wherepegawai);
        $wherekategorilembur=KategoriLembur::where('id_jabatan',$wherepegawai->id_jabatan)->where('id_golongan',$wherepegawai->id_golongan)->first();
        // dd($wherekategorilembur);
        $wherelemburpegawai=LemburPegawai::where('id_pegawai',$wherepegawai->id)->get();
        $Jumlah_jam=0;
        foreach ($wherelemburpegawai as $jam) {
            $Jumlah_jam+=$jam->jumlah_jam;
        }
        // dd($Jumlah_jam);
        $wherejabatan=Jabatan::where('id',$wherepegawai->id_jabatan)->first();
        // dd($wherejabatan);
        $wheregolongan=Golongan::where('id',$wherepegawai->id_golongan)->first();
        // dd($wheregolongan);
        $penggajian=new Penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangan=PegawaiTunjangan::paginate(10);
            return view('penggajian.create',compact('tunjangan','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang);
        $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang);
        $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{
            $penggajian->jumlah_jam_lembur=$Jumlah_jam;
            $penggajian->jumlah_uang_lembur=$Jumlah_jam*$wherekategorilembur->besar_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($Jumlah_jam*$wherekategorilembur->besar_uang)+($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang)+($wheretunjangan->besar_tunjangan);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }

            return redirect('penggajian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datapenggajian=Penggajian::find($id);
        return view('penggajian.read',compact('datapenggajian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji=Penggajian::find($id);
        $penggajian=new Penggajian ;
        $penggajian=array('status_pengambilan'=>1,'tanggal_pengambilan'=>date('y-m-d'));
        Penggajian::where('id',$id)->update($penggajian);
        return redirect('penggajian');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Penggajian::find($id)->delete();
        return redirect('penggajian');
    }
}
