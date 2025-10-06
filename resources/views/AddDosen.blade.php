@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
  <div class="card bg-dark text-white" style="width: 40rem;">
    <div class="card-header text-center fs-3">Create Dosen</div>
    <div class="card-body">
      <form action="{{ route('StoreDosen') }}" method="POST">
        @csrf
        <!-- Nama Dosen -->
        <div class="mb-3">
          <label for="inputkode" class="form-label">Nama Dosen</label>
          <input type="text" name="name" id="inputName" class="form-control">
        </div>

        <!-- NIP -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">NIP</label>
          <input type="text" name="NIP" id="inputNim" class="form-control">
        </div>

        <!-- Pendidikan Terakhir -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">Pendidikan Terakhir</label>
          <input type="text" name="pendidikan_terakhir" id="inputNim" class="form-control">
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
          <a href="{{ route('Main3')}}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection