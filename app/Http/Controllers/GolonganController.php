<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Golongan;
use Input;
class GolonganController extends Controller
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
        $golongan=Golongan::all();
        return view('golongan.index',compact('golongan'));
        //dd($gol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eda=['kode_golongan'=>'required|unique:golongan',
              'nama_golongan'=>'required',
              'besar_uang'=>'required|numeric'];
        $koy=['kode_golongan.required'=>'Data Tidak Boleh Kosong',
              'kode_golongan.unique'=>'Data Tidak Boleh Sarua',
              'nama_golongan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.numeric'=>'Data Tidak Boleh Dengan Kata'];
        $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect()->back()
                             ->withErrors($edakoy)
                             ->withInput();
        }
        else{
            $a = new Golongan;
            $a->kode_golongan=Input::get('kode_golongan');
            $a->nama_golongan=Input::get('nama_golongan');
            $a->besar_uang=Input::get('besar_uang');
            $a->save();
            return redirect('golongan');
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
        $gol=Golongan::find($id);
        return view('golongan.edit',compact('gol'));
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
     $cariid=Golongan::find($id);
        if ($cariid->kode_golongan != Request('kode_golongan')) {
        $eda=['kode_golongan'=>'required|unique:golongan',
              'nama_golongan'=>'required',
              'besar_uang'=>'required'];
          }
        else{
           $eda=['kode_golongan'=>'required',
              'nama_golongan'=>'required',
              'besar_uang'=>'required']; 
        }
        $koy=['kode_golongan.required'=>'Data Tidak Boleh Kosong',
              'kode_golongan.unique'=>'Data Tidak Boleh Sarua',
              'nama_golongan.required'=>'Data Tidak Boleh Kosong',
              'besar_uang.required'=>'Data Tidak Boleh Kosong'];
        
        $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect()->back()
                             ->withErrors($edakoy)
                             ->withInput();
        }
        
    $bookUpdate=Request::all();
   $book=Golongan::find($id);
   $book->update($bookUpdate);
   return redirect('golongan');;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Golongan::findOrFail($id);

    $hapus->delete();

    return redirect()->route('golongan.index');
    }
}
