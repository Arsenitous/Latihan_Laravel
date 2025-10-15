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
        $rules = [
            'kode_MK' => 'required|string|min:3|max:10',
            'nama_Matakuliah' => 'required|string|min:2|max:100',
            'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
            'id_Dosen' => 'required|integer|exists:table_dosen,id_Dosen',
            'sks'=>'required|integer|min:1|max:3',
        ];

        $messages = [
    // Kode MK
    'kode_MK.required' => 'Kode mata kuliah wajib diisi!',
    'kode_MK.string' => 'Kode mata kuliah harus berupa teks!',
    'kode_MK.min' => 'Kode mata kuliah minimal 3 karakter!',
    'kode_MK.max' => 'Kode mata kuliah maksimal 10 karakter!',

    // Nama Mata Kuliah
    'nama_Matakuliah.required' => 'Nama mata kuliah wajib diisi!',
    'nama_Matakuliah.string' => 'Nama mata kuliah harus berupa teks!',
    'nama_Matakuliah.min' => 'Nama mata kuliah minimal 2 karakter!',
    'nama_Matakuliah.max' => 'Nama mata kuliah maksimal 100 karakter!',

    // Jurusan
    'jurusan.required' => 'Jurusan wajib dipilih!',
    'jurusan.in' => 'Jurusan yang dipilih tidak valid!',

    // Dosen
    'id_Dosen.required' => 'Dosen pengampu wajib dipilih!',
    'id_Dosen.integer' => 'ID dosen harus berupa angka!',
    'id_Dosen.exists' => 'Dosen yang dipilih tidak ditemukan!',

    // SKS
    'sks.required' => 'Jumlah SKS wajib diisi!',
    'sks.integer' => 'Jumlah SKS harus berupa angka!',
    'sks.min' => 'Minimal 1 SKS!',
    'sks.max' => 'Maksimal 3 SKS!',
];

    $data = $request->validate($rules, $messages);

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

           $rules = [
            'kode_MK' => 'required|string|min:3|max:10',
            'nama_Matakuliah' => 'required|string|min:2|max:100',
            'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
            'id_Dosen' => 'required|integer|exists:table_dosen,id_Dosen',
            'sks'=>'required|integer|min:1|max:3',
        ];

        $messages = [
    // Kode MK
    'kode_MK.required' => 'Kode mata kuliah wajib diisi!',
    'kode_MK.string' => 'Kode mata kuliah harus berupa teks!',
    'kode_MK.min' => 'Kode mata kuliah minimal 3 karakter!',
    'kode_MK.max' => 'Kode mata kuliah maksimal 10 karakter!',

    // Nama Mata Kuliah
    'nama_Matakuliah.required' => 'Nama mata kuliah wajib diisi!',
    'nama_Matakuliah.string' => 'Nama mata kuliah harus berupa teks!',
    'nama_Matakuliah.min' => 'Nama mata kuliah minimal 2 karakter!',
    'nama_Matakuliah.max' => 'Nama mata kuliah maksimal 100 karakter!',

    // Jurusan
    'jurusan.required' => 'Jurusan wajib dipilih!',
    'jurusan.in' => 'Jurusan yang dipilih tidak valid!',

    // Dosen
    'id_Dosen.required' => 'Dosen pengampu wajib dipilih!',
    'id_Dosen.integer' => 'ID dosen harus berupa angka!',
    'id_Dosen.exists' => 'Dosen yang dipilih tidak ditemukan!',

    // SKS
    'sks.required' => 'Jumlah SKS wajib diisi!',
    'sks.integer' => 'Jumlah SKS harus berupa angka!',
    'sks.min' => 'Minimal 1 SKS!',
    'sks.max' => 'Maksimal 3 SKS!',
];

    $data = $request->validate($rules, $messages);

        Matakuliah::where('id_MK', $id)->update($data);

        return redirect('/matakuliah')->with('pesan','data berhasil diupdate!');

    }

    public function delete($id) {
         Matakuliah::findOrFail($id)->delete();
        return redirect('/matakuliah')->with('pesan','data berhasil dihapus');
    }


}
