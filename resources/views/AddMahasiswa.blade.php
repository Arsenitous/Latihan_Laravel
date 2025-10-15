@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center mt-4 mb-4">
  <div class="card bg-dark text-white" style="width: 45rem;">
    <div class="card-header text-center fs-3">Create Mahasiswa</div>
    <div class="card-body">
      <form action="{{ route('StoreMahasiswa') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-3">
          <label for="inputName" class="form-label">Nama</label>
          <input type="text" name="name" id="inputName" class="form-control" required>
        </div>

        <!-- NIM -->
        <div class="mb-3">
          <label for="inputNim" class="form-label">NIM</label>
          <input type="text" name="NIM" id="inputNim" class="form-control" required>
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-3">
          <label for="inputTempat" class="form-label">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="inputTempat" class="form-control" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
          <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="inputTanggal" class="form-control" required>
        </div>

        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanSTI" value="Sistem Teknologi Informasi" required>
            <label class="form-check-label" for="jurusanSTI">Sistem Teknologi Informasi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanBD" value="Bisnis Digital">
            <label class="form-check-label" for="jurusanBD">Bisnis Digital</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanKWU" value="Kewirausahaan">
            <label class="form-check-label" for="jurusanKWU">Kewirausahaan</label>
          </div>
        </div>

        <!-- Angkatan -->
        <div class="mb-3 pb-3">
          <label for="inputAngkatan" class="form-label">Angkatan</label>
          <input type="number" name="angkatan" id="inputAngkatan" class="form-control" required>
        </div>

        <hr class="border-light">

        <!-- Pilih Mata Kuliah -->
        <div class="mb-3 pt-3">
          <label for="matakuliahSelect" class="form-label">Pilih Mata Kuliah</label>
          <div class="d-flex gap-2">
            <select id="matakuliahSelect" class="form-select">
              <option value="">-- Pilih Mata Kuliah --</option>
              @foreach ($matakuliah as $item)
                {{-- PENTING: gunakan id_MK (sesuai struktur DB) --}}
                <option value="{{ $item->id_MK }}" data-sks="{{ $item->sks }}">
                  {{ $item->nama_Matakuliah }} ({{ $item->sks }} SKS) - {{ $item->jurusan }}
                </option>
              @endforeach
            </select>
            <button type="button" class="btn btn-primary" id="addMatkul">Tambah</button>
          </div>
        </div>

        <!-- Tabel Mata Kuliah yang Diambil -->
        <h5 class="text-center pt-4 mb-3">Mata Kuliah yang Diambil</h5>
        <table class="table table-bordered table-dark text-white align-middle" id="tabelMatkul">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Mata Kuliah</th>
              <th>SKS</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr id="emptyRow">
              <td colspan="4" class="text-center text-secondary">Belum ada mata kuliah dipilih</td>
            </tr>
          </tbody>
        </table>

        <!-- Hidden input untuk dikirim ke backend -->
        <div id="matkulInputs"></div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end mt-3">
          <button type="submit" class="btn btn-success me-2">Tambah Data</button>
          <a href="{{ route('Main') }}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script_mahasiswa')
<script>
document.addEventListener("DOMContentLoaded", () => {
  const select = document.getElementById('matakuliahSelect');
  const addBtn = document.getElementById('addMatkul');
  const tableBody = document.querySelector('#tabelMatkul tbody');
  const inputContainer = document.getElementById('matkulInputs');
  let counter = 1;

  addBtn.addEventListener('click', () => {
    const selectedOption = select.options[select.selectedIndex];

    // Debug: tampilkan apa yang JS baca
    console.log('SELECTED OPTION (raw):', selectedOption);
    const id = selectedOption?.value?.trim() ?? '';
   const namaMK = selectedOption.text.split('(')[0].trim();
const sks = selectedOption.dataset.sks;
const jurusan = selectedOption.text.split('-').pop().trim();
const text = `${namaMK} (${sks} SKS) - ${jurusan}`;

    console.log("DEBUG -> id:", id, "text:", text, "sks:", sks);

    if (!id) {
      alert('Pilih mata kuliah dulu!');
      return;
    }

    // Hapus placeholder jika ada
    document.getElementById('emptyRow')?.remove();

    // Cegah duplikat
    if (document.getElementById(`matkul_${id}`)) {
      alert('Mata kuliah sudah dipilih!');
      return;
    }

    // Tambah baris tabel
    const row = document.createElement('tr');
    row.id = `matkul_${id}`;
    row.innerHTML = `
      <td>${counter++}</td>
      <td>${text}</td>
      <td>${sks}</td>
      <td><button type="button" class="btn btn-danger btn-sm" onclick="removeMatkul('${id}')">Hapus</button></td>
    `;
    tableBody.appendChild(row);

    // Tambah hidden input untuk dikirim ke controller
    const hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.name = 'matakuliah[]'; // pastikan controller menerima 'matakuliah'
    hidden.value = id;
    hidden.id = `input_${id}`;
    inputContainer.appendChild(hidden);
  });
});

function removeMatkul(id) {
  document.getElementById(`matkul_${id}`)?.remove();
  document.getElementById(`input_${id}`)?.remove();

  const tableBody = document.querySelector('#tabelMatkul tbody');
  if (tableBody.children.length === 0) {
    tableBody.innerHTML = `
      <tr id="emptyRow">
        <td colspan="4" class="text-center text-secondary">Belum ada mata kuliah dipilih</td>
      </tr>`;
  }
}
</script>
@endsection
