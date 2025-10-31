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

        $rules = [
        'name' => 'required|string|min:3|max:100',
        'NIM' => 'required|string|min:5|max:15|unique:table_mahasiswa,NIM',
        'tempat_lahir' => 'required|string|min:3|max:50',
        'tanggal_lahir' => 'required|date',
        'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
        'angkatan' => 'required|integer|min:1900|max:' . date('Y'),
        'matakuliah' => 'required|array|min:1',
        'matakuliah.*' => 'integer|exists:table_matakuliah,id_MK',
    ];

    $messages = [
        // Nama
        'name.required' => 'Nama mahasiswa wajib diisi!',
        'name.string' => 'Nama mahasiswa harus berupa teks!',
        'name.min' => 'Nama mahasiswa minimal 3 karakter!',
        'name.max' => 'Nama mahasiswa maksimal 100 karakter!',

        // NIM
        'NIM.required' => 'NIM wajib diisi!',
        'NIM.string' => 'NIM harus berupa teks!',
        'NIM.min' => 'NIM minimal 5 karakter!',
        'NIM.max' => 'NIM maksimal 15 karakter!',
        'NIM.unique' => 'NIM ini sudah terdaftar!',

        // Tempat Lahir
        'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
        'tempat_lahir.string' => 'Tempat lahir harus berupa teks!',
        'tempat_lahir.min' => 'Tempat lahir minimal 3 karakter!',
        'tempat_lahir.max' => 'Tempat lahir maksimal 50 karakter!',

        // Tanggal Lahir
        'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
        'tanggal_lahir.date' => 'Format tanggal lahir tidak valid!',

        // Jurusan
        'jurusan.required' => 'Jurusan wajib dipilih!',
        'jurusan.in' => 'Jurusan yang dipilih tidak valid!',

        // Angkatan
        'angkatan.required' => 'Angkatan wajib diisi!',
        'angkatan.integer' => 'Angkatan harus berupa angka!',
        'angkatan.min' => 'Angkatan terlalu kecil!',
        'angkatan.max' => 'Angkatan tidak boleh melebihi tahun sekarang!',

        // Mata Kuliah
        'matakuliah.required' => 'Pilih minimal satu mata kuliah!',
        'matakuliah.array' => 'Format data mata kuliah tidak valid!',
        'matakuliah.*.exists' => 'Salah satu mata kuliah tidak ditemukan di database!',
    ];

         $data = $request->validate($rules, $messages);

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

         $rules = [
        'name' => 'required|string|min:3|max:100',
        'NIM' => 'required|string|min:5|max:15|unique:table_mahasiswa,NIM',
        'tempat_lahir' => 'required|string|min:3|max:50',
        'tanggal_lahir' => 'required|date',
        'jurusan' => 'required|in:Sistem Teknologi Informasi,Bisnis Digital,Kewirausahaan',
        'angkatan' => 'required|integer|min:1900|max:' . date('Y'),
        'matakuliah' => 'required|array|min:1',
        'matakuliah.*' => 'integer|exists:table_matakuliah,id_MK',
    ];

    $messages = [
        // Nama
        'name.required' => 'Nama mahasiswa wajib diisi!',
        'name.string' => 'Nama mahasiswa harus berupa teks!',
        'name.min' => 'Nama mahasiswa minimal 3 karakter!',
        'name.max' => 'Nama mahasiswa maksimal 100 karakter!',

        // NIM
        'NIM.required' => 'NIM wajib diisi!',
        'NIM.string' => 'NIM harus berupa teks!',
        'NIM.min' => 'NIM minimal 5 karakter!',
        'NIM.max' => 'NIM maksimal 15 karakter!',
        'NIM.unique' => 'NIM ini sudah terdaftar!',

        // Tempat Lahir
        'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
        'tempat_lahir.string' => 'Tempat lahir harus berupa teks!',
        'tempat_lahir.min' => 'Tempat lahir minimal 3 karakter!',
        'tempat_lahir.max' => 'Tempat lahir maksimal 50 karakter!',

        // Tanggal Lahir
        'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
        'tanggal_lahir.date' => 'Format tanggal lahir tidak valid!',

        // Jurusan
        'jurusan.required' => 'Jurusan wajib dipilih!',
        'jurusan.in' => 'Jurusan yang dipilih tidak valid!',

        // Angkatan
        'angkatan.required' => 'Angkatan wajib diisi!',
        'angkatan.integer' => 'Angkatan harus berupa angka!',
        'angkatan.min' => 'Angkatan terlalu kecil!',
        'angkatan.max' => 'Angkatan tidak boleh melebihi tahun sekarang!',

        // Mata Kuliah
        'matakuliah.required' => 'Pilih minimal satu mata kuliah!',
        'matakuliah.array' => 'Format data mata kuliah tidak valid!',
        'matakuliah.*.exists' => 'Salah satu mata kuliah tidak ditemukan di database!',
    ];

         $data = $request->validate($rules, $messages);

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
