@extends('layouts.master')

@section('konten')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
 <div class="container mt-4">

         <a href="/add_dosen" class="btn btn-success mb-3">
            ADD Dosen
        </a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Pendidikan Terakhir</th>
                    <th scope="col">Jurusan</th>
                     <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($dosen as $d)
                    <tr>
                        <td>{{ $d->id_Dosen }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->NIP }}</td>
                        <td>{{ $d->pendidikan_terakhir }}</td>
                        <td>{{ $d->jurusan }}</td>
                        <td>
                        <a href="/dosen/{{$d->id_Dosen}}" class="btn btn-primary me-2">EDIT</a>
                        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#hapus{{ $d->id_Dosen}}">Hapus</button>
                        </td>
                    </tr>
                  
                @endforeach
            </tbody>
        </table>

   @foreach ($dosen as $item)
<div class="modal fade" id="hapus{{ $item->id_Dosen }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/dosen/{{ $item->id_Dosen }}" method="POST" class="modal-content">
      @csrf
      @method('delete')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah yakin ingin menghapus data matakuliah <b>{{ $item->name }}</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
      </div>
    </form>
  </div>
    </div>
    @endforeach
        </div>
@endsection