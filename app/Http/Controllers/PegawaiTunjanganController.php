<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\PegawaiTunjangan;
use App\Tunjangan;
use App\Pegawai;
use Input;
class PegawaiTunjanganController extends Controller
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
        $pt=PegawaiTunjangan::all();

         // dd($pt);
        return view('pegawaitunjangan.index',compact('pt')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('pegawaitunjangan.create',compact('tunjangan','pegawai'));
    }
    public function createerror()
    {
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('pegawaitunjangan.createerror',compact('tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulles=['id_tunjangan'=>'required|unique:pegawaitunjangan',
                 'id_pegawai'=>'required'];
        $sms=['id_tunjangan.required'=>'Maaf Data Tidak Boleh Kosong',
              'id_tunjangan.unique'=>'Data Sudah Ada',
              'id_pegawai.required'=>'Maaf Data Tidak Boleh Kosong'];
        $Validate=Validator::make(Input::all(),$rulles,$sms);
        if ($Validate->fails()) {
            return redirect()->back()
                   ->withErrors($Validate)
                   ->withInput();
        }
        else{
            $naon=Pegawai::where('id',Request('id_pegawai'))->first();
            $naons=Tunjangan::where('id_golongan',$naon->id_golongan)->where('id_jabatan',$naon->id_jabatan)->first();
            if($naons){
            $A=new PegawaiTunjangan;
            $A->id_tunjangan=Input::get('id_tunjangan');
            $A->id_pegawai=Input::get('id_pegawai');
            $A->save();
            return redirect('tunjanganpegawai');
            }
            return redirect('createerror');
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
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        $tunjanganpegawai = PegawaiTunjangan::where('id', $id)->first();
        return view('pegawaitunjangan.edit',compact('tunjangan','pegawai','tunjanganpegawai'));
    }
    public function editerror($id)
    {
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        $tunjanganpegawai = PegawaiTunjangan::where('id', $id)->first();
        return view('pegawaitunjangan.editerror',compact('tunjangan','pegawai','tunjanganpegawai'));
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
        $this->validate($request,['id_tunjangan'=>'required:unique:tunjangan','id_pegawai'=>'required']);
         $naon=Pegawai::where('id',Request('id_pegawai'))->first();
            $naons=Tunjangan::where('id_golongan',$naon->id_golongan)->where('id_jabatan',$naon->id_jabatan)->first();
            if($naons){
         $update = PegawaiTunjangan::where('id', $id)->first();
        $update->id_tunjangan = $request['id_tunjangan'];
        $update->id_pegawai = $request['id_pegawai'];
        $update->update();
        return redirect()->to('/tunjanganpegawai');
    }
        return redirect()->to('/editerror');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjanganp=PegawaiTunjangan::find($id)->delete();
        return redirect('tunjanganpegawai');
    }
}
