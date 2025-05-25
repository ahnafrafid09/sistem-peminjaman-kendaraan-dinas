@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2>KAPALAY USER</h2>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>MEDIA-PROGRAM</strong></li>
                <li><strong>MEDIA-PROGRAMM</strong></li>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Dataset</h3>
            <p><strong>Kapala web</strong></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>N/A</th>
                            <th>Name</th>
                            <th>Tvip</th>
                            <th>Email</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user['no'] }}</td>
                            <td>{{ $user['na'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['tvip'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                @if($user['edit'])
                                    <span class="text-success">✅</span>
                                @else
                                    <span class="text-danger">❌</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>TABLE OF USER</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>MEDIA_UBIT</strong></li>
                <li>0</li>
            </ul>
        </div>
    </div>
</div>
@endsection