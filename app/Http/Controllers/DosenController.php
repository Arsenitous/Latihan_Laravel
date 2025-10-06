<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
     public function index(){

        return view('IndexDosen',['dosen'=>Dosen::all()]);
    }

    public function create(){
        return view('AddDosen');
    }

      public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'NIP' => 'required',
            'pendidikan_terakhir' => 'required',
            'jurusan' => 'required',
        ]);

   Dosen::create($data);

    return redirect('/dosen')->with('pesan', 'berhasil menambahkan data');

    }

      public function show($id){
        // dd($id);

        $data = Dosen::findOrFail($id);
        // dd($data);

        return view('EditDosen',[
            'item'=>$data
        ]);

        

    }


 public function update($id,Request $request ){

         $data = $request->validate([
            'name' => 'required',
            'NIP' => 'required',
            'pendidikan_terakhir' => 'required',
            'jurusan' => 'required',
        ]);

        Dosen::where('id_Dosen', $id)->update($data);

        return redirect('/dosen')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
         Dosen::findOrFail($id)->delete();
        return redirect('/dosen')->with('pesan','data berhasil dihapus');
    }

 
}
