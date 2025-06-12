@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container mt-5 shadow p-3 border border-light border-1">
        <div class="bg-light border border-2 border-gray mb-2 p-2">
            <p class="text-primary">Memperbarui User</p>
        </div>
        @include('partials.toast-success')
        @include('partials.toast-error')
        <form method="POST" action="{{ route('admin.update-user', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ $user->nik }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="foto_profil" class="form-label">Upload Foto Profile</label>
                    <input type="file" accept=".jpeg,.jpg,.png,.gif,.svg" name="foto_profil" id="foto_profil"
                        class="form-control">
                    @if ($user->foto_profil !== null)
                        <div class="mt-2">
                            <img width="150" height="150" src="/storage/{{ $user->foto_profil }}" alt="Foto Profil"
                                class="rounded">
                            <p>Foto Profil Sekarang</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required
                        value="{{ $user->username }}">
                </div>
                <div class="col-md-6">
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $listJurusan)
                            <option value="{{ $listJurusan->id }}"
                                {{ old('jurusan_id', $user->jurusan_id) == $listJurusan->id ? 'selected' : '' }}>
                                {{ $listJurusan->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="prodi_id">Prodi</label>
                    <select name="prodi_id" id="prodi_id" class="form-select" required>
                        <option value="">-- Pilih Prodi --</option>
                        @foreach ($prodi as $listProdi)
                            <option
                                value="{{ $listProdi->id }}"{{ old('prodi_id', $user->prodi_id) == $listProdi->id ? 'selected' : '' }}>
                                {{ $listProdi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="super_admin"{{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super
                            Admin</option>
                        <option value="kepala_unit"{{ old('role', $user->role) == 'kepala_unit' ? 'selected' : '' }}>Kepala
                            Unit</option>
                        <option value="pegawai"{{ old('role', $user->role) == 'pegawai' ? 'selecter' : '' }}>Pegawai
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control"
                        value="{{ $user->no_telepon }}"required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label mt-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" value="{{ $user->alamat }}"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
