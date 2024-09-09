@extends('layouts.app')
@section('title', 'Data Pendaftaran')
@section('active_pendaftaran', 'active-page')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pendaftaran</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $registration->kode_pendaftaran }}</td>
                                        <td>{{ $registration->nama_lengkap }}</td>
                                        <td>{{ $registration->jenis_kelamin }}</td>
                                        <td>{{ $registration->tanggal_lahir }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Detail</a>
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
@endsection