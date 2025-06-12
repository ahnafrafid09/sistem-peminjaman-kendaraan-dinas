@extends('layouts.app')

@section('title', 'Kelola Lokasi')

@section('content')
    @include('partials.toast-success')
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('admin.lokasi.create') }}" class="btn btn-primary btn-lg shadow">Tambah Lokasi</a>
    </div>
    <div class="container-xxl">
        <div
            class="d-flex border-start border-top-0 border-end-0 border-bottom-0 border-5 border-primary rounded shadow p-3 align-items-center bg-white">
            <div class="flex-grow-1">
                <h6 class="mb-1 text-primary">Jumlah Lokasi</h6>
                <h4 class="mb-0 fw-bold">{{ $jumlahLokasi }}</h4>
            </div>
        </div>
        <div class="mt-5">
            <h4>Data Lokasi</h4>
            <div class="table-wrapper">
                <div class="table-heading d-flex justify-content-start align-items-center mb-3">
                    <span class="text-primary fw-bold fs-5">Lokasi</span>
                </div>
                <div>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listLokasi as $lokasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lokasi->lokasi }}</td>
                                            <td>
                                                <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-pen me-1"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
