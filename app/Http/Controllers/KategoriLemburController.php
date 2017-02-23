<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\KategoriLembur;
use App\Jabatan;
use App\Golongan;
use Input;
class KategoriLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Adrimistrasi');
    }
    public function index()
    {
        $lembur=KategoriLembur::all();
        return view('kategorilembur.index',compact('lembur'));
        // dd($lembur);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('kategorilembur.create',compact('jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eda=['kode_lembur'=>'required|unique:kategorilembur',
              'id_jabatan'=>'required',
              'id_golongan'=>'required',
              'besar_uang'=>'required|numeric'];
        $koy=['kode_lembur.required'=>'Data Tidak Boleh Kosong',
              'kode_lembur.unique'=>'Data Tidak Boleh Sarua',
              'id_golongan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong',
              'id_jabatan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.numeric'=>'Data Tidak Boleh Menggunakan Kata'];

      $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect('kategorilembur/create')
                             ->withErrors($edakoy)
                             ->withInput();
        }
        else{
            $a=new KategoriLembur;
            $a->kode_lembur=Input::get('kode_lembur');
            $a->id_jabatan=Input::get('id_jabatan');
            $a->id_golongan=Input::get('id_golongan');
            $a->besar_uang=Input::get('besar_uang');
            $a->save();
            return redirect('kategorilembur');
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
        
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        $kategori = KategoriLembur::where('id', $id)->first();
        return view('kategorilembur.edit',compact('golongan','jabatan','kategori'));
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
        $cariid=KategoriLembur::find($id);
        if($cariid->kode_lembur != Request('kode_lembur')){
        $eda=['kode_lembur'=>'required|unique:kategorilembur',
              'id_jabatan'=>'required',
              'id_golongan'=>'required',
              'besar_uang'=>'required|numeric'];
              }
        else{
            $eda=['kode_lembur'=>'required',
              'id_jabatan'=>'required',
              'id_golongan'=>'required',
              'besar_uang'=>'required|numeric'];
              }

    
        $koy=['kode_lembur.required'=>'Data Tidak Boleh Kosong',
              'kode_lembur.unique'=>'Data Tidak Boleh Sarua',
              'id_golongan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong',
              'id_jabatan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.numeric'=>'Data Tidak Boleh Menggunakan Kata'];

      $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect()->back()
                             ->withErrors($edakoy)
                             ->withInput();
        }
                    $update = KategoriLembur::where('id', $id)->first();
        $update->kode_lembur = $request['kode_lembur'];
        $update->id_golongan = $request['id_golongan'];
           $update->id_jabatan = $request['id_jabatan'];
           $update->besar_uang = $request['besar_uang'];
        $update->update();

        return redirect()->to('/kategorilembur');
        

             
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
