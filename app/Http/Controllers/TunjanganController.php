<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use App\Tunjangan;
use App\Golongan;
use App\Jabatan;
class TunjanganController extends Controller
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
        $tunjangan=Tunjangan::all();
        return view('tunjangan.index',compact('tunjangan'));
        //dd($tunjangan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=Tunjangan::all();
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        return view('tunjangan.create',compact('tunjangan','golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $rules =['kode_tunjangan'=>'required|unique:tunjangan',
                 'id_golongan'=>'required',
                 'id_jabatan'=>'required',
                 'status'=>'required',
                 'jumlah_anak'=>'required|numeric',
                 'besar_tunjangan'=>'required|numeric'];
        

        $sms   =['kode_tunjangan.required'=>'Data Harus Di Input',
                 'kode_tunjangan.unique'=>'Data Kode Tunjangan Tidak Boleh Sama',
                 'id_golongan.required'=>'Data Harus Di Input',
                 'id_jabatan.required'=>'Data Harus Di Input',
                 'status.required'=>'Data Harus Di Input',
                 'jumlah_anak.required'=>'Data Harus Di Input',
                 'jumlah_anak.numeric'=>'Harus Di Input Dengan Angka',
                 'besar_tunjangan.required'=>'Data Harus Di Input',
                 'besar_tunjangan.numeric'=>'Harus Di Input Dengan Angka'];

        $koy=Validator::make(Input::all(),$rules,$sms);
        if ($koy->fails()) {
            return redirect()->back()->withErrors($koy)->withInput();
        }
        else{
            $a=new Tunjangan;
            $a->kode_tunjangan=Input::get('kode_tunjangan');
            $a->id_golongan=Input::get('id_golongan');
            $a->id_jabatan=Input::get('id_jabatan');
            $a->status=Input::get('status');
            $a->jumlah_anak=Input::get('jumlah_anak');
            $a->besar_tunjangan=Input::get('besar_tunjangan');
            $a->save();
            return redirect('tunjangan');
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
        $tunjangan = Tunjangan::where('id', $id)->first();
        return view('tunjangan.edit',compact('golongan','jabatan','tunjangan'));
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
        $cariid=Tunjangan::find($id);
        if($cariid->kode_tunjangan != Request('kode_tunjangan')){
        $rules =['kode_tunjangan'=>'required|unique:tunjangan',
                 'id_golongan'=>'required',
                 'id_jabatan'=>'required',
                 'status'=>'required',
                 'jumlah_anak'=>'required|numeric',
                 'besar_tunjangan'=>'required|numeric'];
        }
        else{
         $rules =['kode_tunjangan'=>'required',
                 'id_golongan'=>'required',
                 'id_jabatan'=>'required',
                 'status'=>'required',
                 'jumlah_anak'=>'required|numeric',
                 'besar_tunjangan'=>'required|numeric'];   
        }
        $sms   =['kode_tunjangan.required'=>'Data Harus Di Input',
                 'kode_tunjangan.unique'=>'Data Kode Tunjangan Tidak Boleh Sama',
                 'id_golongan.required'=>'Data Harus Di Input',
                 'id_jabatan.required'=>'Data Harus Di Input',
                 'status.required'=>'Data Harus Di Input',
                 'jumlah_anak.required'=>'Data Harus Di Input',
                 'jumlah_anak.numeric'=>'Harus Di Input Dengan Angka',
                 'besar_tunjangan.required'=>'Data Harus Di Input',
                 'besar_tunjangan.numeric'=>'Harus Di Input Dengan Angka'];

        $koy=Validator::make(Input::all(),$rules,$sms);
        if ($koy->fails()) {
            return redirect()->back()->withErrors($koy)->withInput();
        }
        $update = Tunjangan::where('id', $id)->first();
        $update->kode_tunjangan = $request['kode_tunjangan'];
        $update->id_golongan = $request['id_golongan'];
        $update->id_jabatan = $request['id_jabatan'];
        $update->status = $request['status'];
        $update->jumlah_anak = $request['jumlah_anak'];
        $update->besar_tunjangan = $request['besar_tunjangan'];
        $update->update();

        return redirect()->to('/tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tunjangan::find($id)->delete();
    return Redirect('kategorilembur');
    }
}
