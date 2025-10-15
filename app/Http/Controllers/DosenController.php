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
       $rules = [
        'name' => 'required|string|min:3|max:100',
        'NIP' => 'required|string|min:5|max:20|unique:table_dosen,NIP',
        'pendidikan_terakhir' => 'required|string|min:2|max:50',
        'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
    ];

    $messages = [
        // Nama
        'name.required' => 'Nama dosen wajib diisi!',
        'name.string' => 'Nama dosen harus berupa teks!',
        'name.min' => 'Nama dosen minimal 3 karakter!',
        'name.max' => 'Nama dosen maksimal 100 karakter!',

        // NIP
        'NIP.required' => 'NIP wajib diisi!',
        'NIP.string' => 'NIP harus berupa teks!',
        'NIP.min' => 'NIP minimal 5 karakter!',
        'NIP.max' => 'NIP maksimal 20 karakter!',
        'NIP.unique' => 'NIP ini sudah terdaftar!',

        // Pendidikan
        'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi!',
        'pendidikan_terakhir.string' => 'Pendidikan terakhir harus berupa teks!',
        'pendidikan_terakhir.min' => 'Pendidikan terakhir minimal 2 karakter!',
        'pendidikan_terakhir.max' => 'Pendidikan terakhir maksimal 50 karakter!',

        // Jurusan
        'jurusan.required' => 'Jurusan wajib dipilih!',
        'jurusan.in' => 'Jurusan yang dipilih tidak valid!',
    ];

    $data = $request->validate($rules, $messages);

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

        $rules = [
        'name' => 'required|string|min:3|max:100',
        'NIP' => 'required|string|min:5|max:20|unique:table_dosen,NIP',
        'pendidikan_terakhir' => 'required|string|min:2|max:50',
        'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
    ];

    $messages = [
        // Nama
        'name.required' => 'Nama dosen wajib diisi!',
        'name.string' => 'Nama dosen harus berupa teks!',
        'name.min' => 'Nama dosen minimal 3 karakter!',
        'name.max' => 'Nama dosen maksimal 100 karakter!',

        // NIP
        'NIP.required' => 'NIP wajib diisi!',
        'NIP.string' => 'NIP harus berupa teks!',
        'NIP.min' => 'NIP minimal 5 karakter!',
        'NIP.max' => 'NIP maksimal 20 karakter!',
        'NIP.unique' => 'NIP ini sudah terdaftar!',

        // Pendidikan
        'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi!',
        'pendidikan_terakhir.string' => 'Pendidikan terakhir harus berupa teks!',
        'pendidikan_terakhir.min' => 'Pendidikan terakhir minimal 2 karakter!',
        'pendidikan_terakhir.max' => 'Pendidikan terakhir maksimal 50 karakter!',

        // Jurusan
        'jurusan.required' => 'Jurusan wajib dipilih!',
        'jurusan.in' => 'Jurusan yang dipilih tidak valid!',
    ];

    $data = $request->validate($rules, $messages);

        Dosen::where('id_Dosen', $id)->update($data);

        return redirect('/dosen')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
         Dosen::findOrFail($id)->delete();
        return redirect('/dosen')->with('pesan','data berhasil dihapus');
    }

 
}
