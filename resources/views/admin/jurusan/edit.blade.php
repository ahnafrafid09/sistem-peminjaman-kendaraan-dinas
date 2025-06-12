@extends('layouts.app')
@section('title', 'Edit Jurusan')
@section('content')
    <div class="container p-0 mt-5 shadow border rounded border-light border-1">
        <div class="bg-light border border-2 rounded border-gray mb-2 px-2 py-3">
            <span class="text-primary">Memperbarui</span>
        </div>
        @include('partials.toast-error')
        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data"
            class="p-4">
            @csrf
            @method('PUT')
            <div class="">
                <label for="nama_jurusan" class="form-label">Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control"
                    value="{{ $jurusan->nama_jurusan }}" required>
            </div>
            <div class="d-flex justify-content-between gap-3 mt-4">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#modalHapus">Hapus</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.jurusan.destroy', $jurusan->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalDelete">Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
