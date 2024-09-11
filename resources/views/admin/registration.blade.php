@extends('layouts.app')
@section('title', 'Data Pendaftaran')
@section('active_pendaftaran', 'active-page')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pendaftaran</h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Data pendaftaran masuk</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pengajuan Disetujui</button>
                        </li>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ str_pad($registration->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $registration->nama_lengkap }}</td>
                                                <td>
                                                    @if ($registration->jenis_kelamin == 'L')
                                                        Laki-laki
                                                    @elseif ($registration->jenis_kelamin == 'P')
                                                        Perempuan
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($registration->status == 'pending')
                                                        <span class="badge bg-warning">Perlu Diverifikasi</span>
                                                    @elseif ($registration->status == 'accepted')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @elseif ($registration->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @elseif ($registration->status == 'pass')
                                                        <span class="badge bg-success">Peserta Sudah Dinyatakan Lolos</span>
                                                    @elseif ($registration->status == 'not_pass')
                                                        <span class="badge bg-danger">Peserta Dinyatakan Tidak Lolos</span>
                                                    @endif
                                                </td>
                                                <td>{{ $registration->tanggal_lahir }}</td>
                                                <td>
                                                    <a href="{{ route('admin.registration.detail', $registration->id) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-bordered" id="datatable1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations_accepted as $registration)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ str_pad($registration->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $registration->nama_lengkap }}</td>
                                            <td>
                                                @if ($registration->jenis_kelamin == 'L')
                                                    Laki-laki
                                                @elseif ($registration->jenis_kelamin == 'P')
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($registration->status == 'pass')
                                                    <span class="badge bg-success">Peserta Sudah Dinyatakan Lolos</span>
                                                @elseif ($registration->status == 'not_pass')
                                                    <span class="badge bg-danger">Peserta Dinyatakan Tidak Lolos</span>
                                                @elseif ($registration->status == 'accepted')
                                                    <span class="badge bg-success">Diterima</span>
                                                @elseif ($registration->status == 'rejected')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td>{{ $registration->tanggal_lahir }}</td>
                                            <td>
                                                <a href="{{ route('admin.registration.detail', $registration->id) }}"
                                                    class="btn btn-primary">Detail</a>
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