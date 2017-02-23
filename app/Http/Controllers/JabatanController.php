<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Jabatan;
use Input;
class JabatanController extends Controller
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
        $jabatan=Jabatan::all();
        return view('jabatan.index',compact('jabatan'));
        //dd($jab);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eda=['kode_jabatan'=>'required|unique:jabatan',
              'nama_jabatan'=>'required',
              'besar_uang'=>'required'];
        $koy=['kode_jabatan.required'=>'Data Tidak Boleh Kosong',
              'kode_jabatan.unique'=>'Data Tidak Boleh Sarua',
              'nama_jabatan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong'];
        $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect()->back()
                             ->withErrors($edakoy)
                             ->withInput();
        }
        else{
            $a = new Jabatan;
            $a->kode_jabatan=Input::get('kode_jabatan');
            $a->nama_jabatan=Input::get('nama_jabatan');
            $a->besar_uang=Input::get('besar_uang');
            $a->save();
            return redirect('jabatan');
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
        
        $jab=Jabatan::find($id);
        return view('jabatan.edit',compact('jab'));
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
         $cariid=Jabatan::find($id);
        if ($cariid->kode_jabatan != Request('kode_jabatan')) {
        $eda=['kode_jabatan'=>'required|unique:jabatan',
              'nama_jabatan'=>'required',
              'besar_uang'=>'required'];
          }
          else{
           $eda=['kode_jabatan'=>'required',
              'nama_jabatan'=>'required',
              'besar_uang'=>'required']; 
          }
        $koy=['kode_jabatan.required'=>'Data Tidak Boleh Kosong',
              'kode_jabatan.unique'=>'Data Tidak Boleh Sarua',
              'nama_jabatan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong'];
        $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect()->back()
                             ->withErrors($edakoy)
                             ->withInput();
        }
        $bookUpdate=Request::all();
   $book=Jabatan::find($id);
   $book->update($bookUpdate);
   return redirect('jabatan');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Jabatan::findOrFail($id);

    $hapus->delete();

    return redirect()->route('jabatan.index');
    }
}
