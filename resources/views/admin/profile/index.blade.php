@extends('layouts.app')

@section('content')
    <div class="container mt-5 shadow p-3 border border-light border-1">
        <div class="bg-light border border-2 border-gray mb-2 p-2">
            <p class="text-primary">Data Profile</p>
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" id="nik" class="form-control" value="{{ Auth::user()->nik }}" disabled>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control"
                        value="{{ Auth::user()->username }}" disabled>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-start">
                <div class="text-center">
                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' }}"
                        alt="Foto Profil" class="rounded-circle img-thumbnail"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" id="jurusan" class="form-control"
                            value="{{ Auth::user()->jurusan->nama_jurusan }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control"
                            value="{{ Auth::user()->alamat }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" id="prodi" class="form-control"
                            value="{{ Auth::user()->prodi->nama_prodi }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        @php
                            $role = Auth::user()->role;
                        @endphp
                        @if ($role === 'super_admin')
                            <input type="text" id="role" name="role" class="form-control" value="Super Admin"
                                disabled>
                        @elseif ($role === 'pegawai')
                            <input type="text" id="role" name="role" class="form-control" value="Pegawai"
                                disabled>
                        @elseif ($role === 'kepala_unit')
                            <input type="text" id="role" name="role" class="form-control" value="Kepala Unit"
                                disabled>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
