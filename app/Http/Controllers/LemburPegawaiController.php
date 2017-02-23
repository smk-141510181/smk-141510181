<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\KategoriLembur;
use App\Pegawai;
use App\LemburPegawai;
use Input;
class LemburPegawaiController extends Controller
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
        // $lembur=LemburPegawai::selectRaw("sum(pegawainulembur.jumlah_jam) as jumlah_jam,
        //                                       pegawainulembur.id_lembur as id_lembur,
        //                                       pegawainulembur.id_pegawai as id_pegawai")->GroupBy('id_lembur','id_pegawai')->get();
         $lembur=LemburPegawai::all();
        return view('lembur.index',compact('lembur'));
        //dd($lembur);
    }    public function index1()
    {
        $lembur=LemburPegawai::selectRaw("sum(pegawainulembur.jumlah_jam) as jumlah_jam,
                                              pegawainulembur.id_lembur as id_lembur,
                                              pegawainulembur.id_pegawai as id_pegawai")->GroupBy('id_lembur','id_pegawai')->get();
         // $lembur=LemburPegawai::all();
        return view('lembur.detail',compact('lembur'));
        //dd($lembur);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lembur=KategoriLembur::all();
        $pegawai=Pegawai::all();
        return view ('lembur.create',compact('lembur','pegawai'));
    }
    public function error()
    {
        $lembur=KategoriLembur::all();
        $pegawai=Pegawai::all();
        return view('lembur.createerror1',compact('lembur','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anti=['id_pegawai'=>'required','jumlah_jam'=>'required|numeric'];
        $mage=[ 'id_pegawai.required'=>'Data Tidak Boleh Kosong',
               'jumlah_jam.required'=>'Data Tidak Boleh Kosong',
               'jumlah_jam.numeric'=>'Harus Di input Dengan Angka']; 
        $axe=Validator::make(Input::all(),$anti,$mage);
        if ($axe->fails()) {
            return redirect()->back()->withErrors($axe)->withInput();
        }
        else{
            $naon=Pegawai::where('id',Request('id_pegawai'))->first();
            $naons=KategoriLembur::where('id_golongan',$naon->id_golongan)->where('id_jabatan',$naon->id_jabatan)->first();
            if ($naons) {
            $a=new LemburPegawai;
            $a->id_lembur=$naons->id;
            $a->id_pegawai=Input::get('id_pegawai');
            $a->jumlah_jam=Input::get('jumlah_jam');
            $a->save();
            return redirect('lembur');    
            }
            return redirect('createerror1');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai=Pegawai::all();
        $kategori=KategoriLembur::all();
        $lembur=LemburPegawai::find($id);
        return view('lembur.edit',compact('lembur','pegawai','kategori'));
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
        $roles=['jumlah_jam'=>'required|numeric',
        ];
        
        $sms=[
            'jumlah_jam.required'=>'jangan kosong',
            'jumlah_jam.numeric'=>'harus angka',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        $update=Request::all();
        $lembur=LemburPegawai::find($id);
        $lembur->update($update);
        return redirect('lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lembur=LemburPegawai::find($id)->delete();
        return redirect('lembur');
    }
}
