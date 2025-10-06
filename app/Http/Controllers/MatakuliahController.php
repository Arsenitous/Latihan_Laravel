<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\Dosen;

class MatakuliahController extends Controller
{
     public function index(){
        // $mahasiswa = Mahasiswa::all();
        // return view('IndexMahasiswa', compact('mahasiswa'));
         $matakuliah = Matakuliah::with('dosen')->get();
        return view('IndexMatakuliah',['matakuliah'=>$matakuliah]);
    }
 
      public function create(){
        $dosens = Dosen::all();
        return view('AddMatakuliah', ['dosens' => $dosens]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'kode_MK' => 'required',
            'nama_Matakuliah' => 'required',
            'jurusan' => 'required',
            'id_Dosen' => 'required',
        ]);

    Matakuliah::create($data);

    return redirect('/matakuliah')->with('pesan', 'berhasil menambahkan data');

    }


    public function show($id){
        // dd($id);

        $data = Matakuliah::findOrFail($id);
        // dd($data);
        $dosens = Dosen::all();


        return view('EditMatakuliah',
        ['item'=>$data],['dosens'=>$dosens]);

    }

    public function update($id,Request $request ){

         $data = $request->validate([
            'kode_MK' => 'required',
            'nama_Matakuliah' => 'required',
            'jurusan' => 'required',
            'id_Dosen' => 'required',
        ]);

        Matakuliah::where('id_MK', $id)->update($data);

        return redirect('/matakuliah')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
         Matakuliah::findOrFail($id)->delete();
        return redirect('/matakuliah')->with('pesan','data berhasil dihapus');
    }


}
