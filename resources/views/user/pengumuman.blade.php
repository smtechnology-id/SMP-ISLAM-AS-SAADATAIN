@extends('layouts.app')

@section('active_pengumuman', 'active-page')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Pengumuman</h3>
            @if ($registration)
                @if ($registration->status == 'pass' || $registration->status == 'not_pass')
                    <div class="container mt-5">
                        <!-- Pengumuman Header -->
                        <div class="text-center">
                            @if ($registration->status == 'pass')
                                <h2 class="fw-bold text-success">Pengumuman: LULUS SELEKSI REGULER</h2>
                            @else
                                <h2 class="fw-bold text-danger">Pengumuman: TIDAK LULUS SELEKSI REGULER</h2>
                            @endif
                        </div>

                        <!-- Card for Announcement -->
                        <div class="card mx-auto" style="">
                            <div class="card-body text-center">
                                <h5 class="card-title">PENGUMUMAN HASIL SELEKSI PPDB SMP ISLAM PLUS AS-SA’ADATAIN</h5>
                                <div class="my-3">
                                    <!-- QR Code Placeholder -->
                                    <img src="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" alt="Logo SMP SA’ADATAIN"
                                        class="img-fluid" style="width: 150px; height: 150px;">
                                </div>
                                <p class="card-text">
                                    <strong>Nama Peserta:</strong> {{ $registration->nama_lengkap }}<br>
                                    <strong>Tanggal Lahir:</strong> {{ $registration->tanggal_lahir }}<br>
                                    <strong>Sekolah Tujuan:</strong> SMP SA’ADATAIN<br>
                                </p>
                                @if ($registration->status == 'pass')
                                    <p class="text-success">Selamat Anda dinyatakan lulus pada seleksi PPDB 2024.</p>
                                @else
                                    <p class="text-danger">Maaf, Anda tidak dinyatakan lulus pada seleksi PPDB 2024.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <p>Maaf Menu Ini Belum Tersedia</p>
                    </div>
                @endif
            @else
                <div class="alert alert-danger">
                    <p>Maaf Menu Ini Belum Tersedia</p>
                </div>
            @endif
        </div>
    </div>
@endsection
