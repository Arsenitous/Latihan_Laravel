@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
  <div class="card bg-dark text-white" style="width: 40rem;">
    <div class="card-header text-center fs-3">Edit Matakuliah</div>
    <div class="card-body">
      <form action="{{ route('UpdateMatakuliah', $item->id_MK) }}" method="POST">
               @method('PUT')
        @csrf
        <!-- Kode MK -->
        <div class="mb-3">
          <label for="inputkode" class="form-label">Kode Matakuliah</label>
          <input type="text" name="kode_MK" id="inputName" class="form-control" value="{{ $item->kode_MK }}">
        </div>

        <!-- Nama Matakuliah -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama Matakuliah</label>
          <input type="text" name="nama_Matakuliah" id="inputNim" class="form-control" value="{{ $item->nama_Matakuliah }}">
        </div>

        <!-- Nama Dosen -->
        <div class="mb-3">
        <label for="inputNama" class="form-label">Nama Dosen</label>
        <select class="form-select" aria-label="Default select example" name="id_Dosen">

          @foreach($dosens as $dosen)
          <option value="{{ $dosen->id_Dosen }}" 
                {{ old('id_Dosen', $item->id_Dosen) == $dosen->id_Dosen ? 'selected' : '' }}>
                {{ $dosen->id_Dosen }} - {{ $dosen->name }}
          </option>
          @endforeach
        </select>
         </div>
        
        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanSTI" value="Sistem Teknologi Informasi"
            @checked(old('jurusan', $item->jurusan) == 'Sistem Teknologi Informasi')>
            <label class="form-check-label" for="jurusanSTI">Sistem Teknologi Informasi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanBD" value="Bisnis Digital"
             @checked(old('jurusan', $item->jurusan) == 'Bisnis Digital')>
            <label class="form-check-label" for="jurusanBD">Bisnis Digital</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanKWU" value="Kewirausahaan"
              @checked(old('jurusan', $item->jurusan) == 'Kewirausahaan')>
            <label class="form-check-label" for="jurusanKWU">Kewirausahaan</label>
          </div>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-warning me-2">Edit Data</button>
          <a href="{{ route('Main2')}}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection