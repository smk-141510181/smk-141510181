<?php

namespace App\Http\Controllers;


use Request;
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
        $this->middleware('HRD');
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
      $peg = Pegawai::where('id', $id)->first();
       $mail = User::where('id', $peg->id_user)->first()->email;
       $data = Request::all();
       $validati = ([
           'name' => 'required|max:255',
           'email' => 'required|email|max:255|unique:users',
           'nip'=>'required|unique:pegawai',
           'id_jabatan' => 'required',
           'id_golongan' => 'required',
           'poto' => 'required',
           ]);
       if ($mail==$data['email']) 
       {
           $validati['email'] = '';
           $data['email'] = $mail;
       }
       if (Input::file() == null)
       {
           $validati['poto'] = '';
       }
       if ($data['nip']==$peg['nip'])
       {
           $validati['nip'] = '';
       }
       else
       {
           $validati['nip'] = 'required|unique:pegawai';
       }

       $validation = Validator::make(Request::all(), $validati);

       if ($validation->fails()) {
           return redirect('pegawai/'.$id.'/edit')->withErrors($validation)->withInput();
       }

       $user = User::where('id', $peg->id_user)->first()->update([
           'name' => $data['name'],
           'email' => $data['email'],
           ]);
       $user = User::where('id', $peg->id_user)->first();
       

       if (Input::file()==null)
       {
           $data['poto'] = $peg->poto;

       }
       else
       {
           $file = Input::file('poto');
           $destination_path = public_path().'/assets/image';
           $filename = $user->name.'_'.$file->getClientOriginalName();
           $uploadSuccess = $file->move($destination_path,$filename);
           $data['poto'] = $filename;
       }

       pegawai::where('id', $id)->first()->update([
           'nip' => $data['nip'],
           'id_jabatan' => $data['id_jabatan'],
           'id_golongan' => $data['id_golongan'],
           'poto' => $data['poto'],
           ]);
       return redirect('pegawai');
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
