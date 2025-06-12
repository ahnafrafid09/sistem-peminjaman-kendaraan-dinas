@extends('layouts.app')
@section('title', 'Tambah Prodi')
@section('content')
    <div class="container p-0 mt-5 shadow border rounded border-light border-1">
        <div class="bg-light border border-2 rounded border-gray mb-2 px-2 py-3">
            <span class="text-primary">Menambahkan</span>
        </div>
        @include('partials.toast-error')
        <form action="{{ route('admin.prodi.store') }}" method="POST" enctype="multipart/form-data" class="p-4"
            id="form">
            @csrf
            <div class="row">
                <div class="mb-2">
                    <label for="nama_prodi" class="form-label">Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" required>
                </div>
                <div>
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $listJurusan)
                            <option value={{ $listJurusan->id }}>{{ $listJurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-3 mt-4">
                <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
