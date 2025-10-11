@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
  <div class="card bg-dark text-white" style="width: 40rem;">
    <div class="card-header text-center fs-3">Create Mata Kuliah</div>
    <div class="card-body">
      <form action="{{ route('StoreMatakuliah') }}" method="POST">
        @csrf
        <!-- Kode MK -->
        <div class="mb-3">
          <label for="inputkode" class="form-label">Kode Matakuliah</label>
          <input type="text" name="kode_MK" id="inputName" class="form-control">
        </div>

        <!-- Nama Matakuliah -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama Matakuliah</label>
          <input type="text" name="nama_Matakuliah" id="inputNim" class="form-control">
        </div>

        <!-- Nama Dosen -->
        <div class="mb-3">
        <label for="inputNama" class="form-label">Nama Dosen</label>
        <select class="form-select" aria-label="Default select example" name="id_Dosen">
          @foreach($dosens as $dosen)
          <option value="{{ $dosen->id_Dosen }}" {{ $loop->first ? 'selected' : '' }}>
          {{ $dosen->id_Dosen }} - {{ $dosen->name }}
          </option>
          @endforeach
        </select>
         </div>

         <!-- SKS -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">SKS</label>
          <input type="text" name="sks" id="inputNim" class="form-control">
        </div>
        
        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanSTI" value="Sistem Teknologi Informasi">
            <label class="form-check-label" for="jurusanSTI">Sistem Teknologi Informasi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanBD" value="Bisnis Digital">
            <label class="form-check-label" for="jurusanBD">Bisnis Digital</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanKWU" value="Kewirausahaan">
            <label class="form-check-label" for="jurusanKWU">Kewirausahaan</label>
          </div>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Tambah Data</button>
          <a href="{{ route('Main2')}}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection