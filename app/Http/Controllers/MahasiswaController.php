<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Void_;

class MahasiswaController extends Controller
{
    public function index(){
        // $mahasiswa = Mahasiswa::all();
        // return view('IndexMahasiswa', compact('mahasiswa'));
        return view('IndexMahasiswa',['mahasiswa'=>Mahasiswa::with('matakuliah')->get()]);
    }

    public function create(){
        return view('AddMahasiswa', ['matakuliah'=>Matakuliah::all()]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'NIM' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'matakuliah' => 'array|required'
        ]);

        $mahasiswa = Mahasiswa::create([
            'name' => $data['name'],
            'NIM' => $data['NIM'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jurusan' => $data['jurusan'],
            'angkatan' => $data['angkatan'],
            'max_sks' => 0,
        ]);

        // Tambahkan relasi matakuliah
        $mahasiswa->matakuliah()->attach($data['matakuliah']);

        //  Hitung total SKS
        $totalSks = $mahasiswa->matakuliah()->sum('sks');
        $mahasiswa->update(['max_sks' => $totalSks]);

        // Mahasiswa::create($data);

        return redirect('/mahasiswa')->with('pesan', 'berhasil menambahkan data');
    }

    public function show($id){
         $mahasiswa = Mahasiswa::with('matakuliah')->findOrFail($id);
        $matakuliah = Matakuliah::all();

        return view('EditMahasiswa', compact('mahasiswa', 'matakuliah'));

    }

    public function update($id,Request $request ){

         $data = $request->validate([
            'name' => 'required',
            'NIM' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'matakuliah' => 'array|required'
        ]);

          $mahasiswa = Mahasiswa::findOrFail($id);

           $mahasiswa->update([
            'name' => $data['name'],
            'NIM' => $data['NIM'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jurusan' => $data['jurusan'],
            'angkatan' => $data['angkatan'],
        ]);
        // Update relasi pivot (hapus & tambahkan ulang)
         $mahasiswa->matakuliah()->sync($data['matakuliah']);

         // Hitung ulang total SKS
        $totalSks = $mahasiswa->matakuliah()->sum('sks');
        $mahasiswa->update(['max_sks' => $totalSks]);

        // Mahasiswa::where('id', $id)->update($data);

        return redirect('/mahasiswa')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // hapus relasi pivot
        $mahasiswa->matakuliah()->detach();

        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('pesan','data berhasil dihapus');
    }

}
