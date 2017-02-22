<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;
use App\Pegawai;
use App\User;
use App\Jabatan;
use App\Golongan;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
use RegistersUsers;
 public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth:HRD');
    }
    public function index()
    {
        $pegawai=Pegawai::all();
        return view ('pegawai.index',compact('pegawai'));
        // dd($pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=Jabatan::all();
        $user=User::all();
        $golongan=Golongan::all();
        return view('pegawai.create',compact('jabatan','user','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

         $this->validate($request,['name'=>'required','email'=>'required|unique:users','permission'=>'required','password'=>'required','nip'=>'required|numeric','id_golongan'=>'required','id_jabatan'=>'required','poto'=>'required']);

        
        
         $file = Input::File('poto');
        $destinationPath = public_path().'/assets/image';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);


        if(Input::hasFile('poto')){
            $ab=new User;
            $ab->name=Input::get('name');
            $ab->email=Input::get('email');
            $ab->password=bcrypt(Input::get('password'));
            $ab->permission=Input::get('permission');
            $ab->save();
            $a = new Pegawai;
            $a->nip=Input::get('nip');
            $a->id_golongan=Input::get('id_golongan');
            $a->id_jabatan=Input::get('id_jabatan');
            $a->id_user=$ab->id;
            $a->poto=$filename;
            $a->save();
            return redirect('pegawai');
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

                $eda=['nip'=>'required|unique:pegawai',
              'id_user'=>'required',
              'id_jabatan'=>'required',
              'poto'=>'required',
              'id_golongan'=>'required',
              'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required|max:255',
            'password' => 'required|min:6|confirmed'];
        $koy=['nip.required'=>'Data Tidak Boleh Kosong',
              'nip.unique'=>'Data Tidak Boleh Sarua',
              'id_user.required'=>'Data Tidak Boleh Kosong',
              'id_golongan.required'=>'Data Tidak Boleh Kosong',
              'poto.required'=>'Data Tidak Boleh Kosong',
              'id_jabatan.required'=>'Data Tidak Boleh Kosong',
              'name.required'=>'Data Tidak Boleh Kosong',
              'email.required'=>'Data Tidak Boleh Kosong',
              'permission.required'=>'Data Tidak Boleh Kosong',
              'password.required'=>'Data Tidak Boleh Kosong'];
      $edakoy=Validator::make(Input::all(),$eda,$koy);
        if ($edakoy->fails()) {
            return redirect('pegawai/create')
                             ->withErrors($edakoy)
                             ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai=Pegawai::find($id);
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('pegawai.edit',compact('pegawai','jabatan','golongan'));
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
        $update = Pegawai::where('id', $id)->first();
        $update->nip = $request['nip'];
        $update->id_golongan = $request['id_golongan'];
        $update->id_jabatan = $request['id_jabatan'];

        if($request->file('poto') == "")
        {
            $update->poto = $update->poto;
        } 
        else
        {
            $file       = $request->file('poto');
            $fileName   = $file->getClientOriginalName();
            $request->file('poto')->move("image/", $fileName);
            $update->poto = $fileName;
        }
        
        $update->update();
        return redirect()->to('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai=Pegawai::find($id);
        
        $user=User::where('id',$pegawai->id_user)->delete();
        $pegawai->delete();
        // dd($pegawai);
        return redirect('pegawai');
    }
}
