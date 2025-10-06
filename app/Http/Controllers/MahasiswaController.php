<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Void_;

class MahasiswaController extends Controller
{
    public function index(){
        // $mahasiswa = Mahasiswa::all();
        // return view('IndexMahasiswa', compact('mahasiswa'));
        return view('IndexMahasiswa',['mahasiswa'=>Mahasiswa::all()]);
    }

    public function create(){
        return view('AddMahasiswa');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'NIM' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);

        Mahasiswa::create($data);

        return redirect('/mahasiswa')->with('pesan', 'berhasil menambahkan data');
    }

    public function show($id){
        // dd($id);

        $data = Mahasiswa::findOrFail($id);
        // dd($data);

        return view('EditMahasiswa',[
            'item'=>$data
        ]);

    }

    public function update($id,Request $request ){

        $data = $request->validate([
            'name' => 'required',
            'NIM' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);

        Mahasiswa::where('id', $id)->update($data);

        return redirect('/mahasiswa')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
         Mahasiswa::findOrFail($id)->delete();
        return redirect('/mahasiswa')->with('pesan','data berhasil dihapus');
    }

}
