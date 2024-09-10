@extends('layouts.app')

@section('active_pembayaran', 'active-page')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($registration)
                @if ($registration->status == 'accepted')
                    <h5 class="card-title">Pembayaran Biaya Masuk</h5>
                    <div class="container mt-5">
                        <div class="row bg-light p-4 rounded">
                            <!-- Payment Details -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Bank Pembayaran:</p>
                                        <img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                            alt="BNI Logo" class="img-fluid mb-3" style="max-width: 150px;">
                                        <h5>Nomor Rekening Pembayaran Uang Masuk:</h5>
                                        <div class="border p-3 rounded mb-3">
                                            8581045301419027
                                        </div>
                                        <h5>Jumlah Pembayaran</h5>
                                        <div class="border p-3 rounded">
                                            Rp. 1.500.000
                                        </div>
                                        <small class="text-muted">*Harap Menyimpan Bukti Pembayaran
                                            sebagai bukti pembayaran.</small>
                                    </div>
                                    <!-- Student Details -->
                                    <div class="col-md-6">
                                        <h5>Nama:</h5>
                                        <p class="fw-bold">{{ auth()->user()->name }}</p>
                                        <h5>Email:</h5>
                                        <p class="fw-bold">{{ auth()->user()->email }}</p>
                                        <hr>
                                        <hr>
                                        @if ($payment == null)
                                            <form action="{{ route('user.payment.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran" class="form-control"
                                                        required>
                                                    <small class="text-muted">*Silahkan Upload bukti
                                                        pembayaran
                                                        sebagai bukti pembayaran.</small>
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="jenis_pembayaran" value="Uang Masuk">
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary">Kirim
                                                        Bukti
                                                        Pembayaran</button>
                                                </div>
                                            </form>
                                        @else
                                            @if ($payment->status == 'pending')
                                                <div class="alert alert-warning">
                                                    Pembayaran sedang divalidasi oleh admin
                                                </div>
                                            @elseif ($payment->status == 'accepted')
                                                <div class="alert alert-success">
                                                    Pembayaran telah diterima, silahkan cek di menu pembayaran
                                                </div>
                                            @elseif ($payment->status == 'rejected')
                                                <div class="alert alert-danger">
                                                    Pembayaran telah ditolak, silahkan Download Kartu Ujian / Kartu Tes di menu 
                                                </div>
                                                <form action="{{ route('user.payment.update') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                        <input type="file" name="bukti_pembayaran" class="form-control"
                                                            required>
                                                        <small class="text-muted">*Silahkan Upload bukti
                                                            pembayaran
                                                            sebagai bukti pembayaran.</small>
                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="jenis_pembayaran" value="Uang Masuk">
                                                        <input type="hidden" name="id" value="{{ $payment->id }}">
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary">Kirim
                                                            Bukti
                                                            Pembayaran</button>
                                                    </div>
                                                </form>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Silahkan selesaikan proses di menu Formulir Pendaftaran <a
                            href="{{ route('user.registration') }}">Formulir</a></p>
                @endif
            @else
                <div class="alert alert-danger">
                    Silahkan selesaikan proses di menu Formulir Pendaftaran
                </div>
            @endif
        </div>
    </div>
@endsection
