@extends('layouts.app')
@section('title', 'Pembayaran Uang Masuk')
@section('active_pembayaran', 'active-page')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran Uang Masuk</h5>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Pembayaran Masuk</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Pembayaran Disetujui</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Pembayaran Ditolak</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments_pending as $payment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ str_pad($payment->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                    @if ($payment->status == 'pending')
                                                        <span class="badge bg-warning">Perlu pengecekan</span>
                                                    @elseif ($payment->status == 'accepted')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @elseif ($payment->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                            alt="Bukti Pembayaran" width="100">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.payment-formulir.accept', $payment->id) }}"
                                                        class="btn btn-primary">Verifikasi</a>
                                                    <a href="{{ route('admin.payment-formulir.reject', $payment->id) }}"
                                                        class="btn btn-danger">Tolak</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments_accepted as $payment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ str_pad($payment->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                    @if ($payment->status == 'pending')
                                                        <span class="badge bg-warning">Perlu pengecekan</span>
                                                    @elseif ($payment->status == 'accepted')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @elseif ($payment->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                            alt="Bukti Pembayaran" width="100">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.payment-formulir.pending', $payment->id) }}"
                                                        class="btn btn-warning">Pendingkan</a>
                                                    <a href="{{ route('admin.payment-formulir.reject', $payment->id) }}"
                                                        class="btn btn-danger">Tolak</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments_rejected as $payment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ str_pad($payment->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                    @if ($payment->status == 'pending')
                                                        <span class="badge bg-warning">Perlu pengecekan</span>
                                                    @elseif ($payment->status == 'accepted')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @elseif ($payment->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/bukti_pembayaran/' . $payment->bukti_pembayaran) }}"
                                                            alt="Bukti Pembayaran" width="100">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.payment-formulir.accept', $payment->id) }}"
                                                        class="btn btn-primary">Verifikasi</a>
                                                    <a href="{{ route('admin.payment-formulir.pending', $payment->id) }}"
                                                        class="btn btn-warning">Pendingkan</a>
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
    </div>
@endsection
