@extends('layouts.app')
@section('title', 'Tambah Jurusan')
@section('content')
    <div class="container p-0 mt-5 shadow border rounded border-light border-1">
        <div class="bg-light border border-2 rounded border-gray mb-2 px-2 py-3">
            <span class="text-primary">Menambahkan</span>
        </div>
        @include('partials.toast-error')
        <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data" class="p-4"
            id="form">
            @csrf
            <div class="">
                <label for="nama_jurusan" class="form-label">Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between gap-3 mt-4">
                <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
