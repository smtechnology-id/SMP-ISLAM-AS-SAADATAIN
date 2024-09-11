@extends('layouts.app')
@section('active_dashboard', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center text-primary">Selamat Datang di Dashboard</h3> <!-- Menambahkan styling teks tengah dan warna -->
                
                <p class="lead text-secondary">Ini adalah tempat Anda dapat melihat informasi penting dan mengelola akun Anda.</p> <!-- Menambahkan kelas lead dan warna teks -->
                <h4 class="mt-4 text-success">Alur Pendaftaran</h4> <!-- Menambahkan margin atas dan warna -->
                <ul class="list-unstyled">
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Melakukan Pembayaran Formulir pada menu <a href="{{ route('user.registration') }}">Formulir Pendaftaran</a> dan mengupload bukti pembayaran</li> <!-- Menambahkan ikon -->
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Setelah pembayaran diverifikasi, Silahkan mengisi data diri pada menu <a href="{{ route('user.registration') }}">Formulir Pendaftaran</a></li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Pastikan data diri sudah terisi dengan benar, kemudian klik tombol "Kirim" untuk mengirim data diri</li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Jika data diri sudah terkirim, Silahkan menunggu sampai pendaftaran disetujui oleh Admin</li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Jika pendaftaran disetujui, Silahkan Membayarkan Uang masuk pendaftaran di menu <a href="{{ route('admin.payment.uang_masuk') }}">Pembayaran Uang Masuk</a></li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Jika pembayaran sudah diverifikasi, maka Anda akan mendapatkan kartu ujian pada menu <a href="{{ route('admin.exam-card') }}">Kartu Ujian</a></li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Setelah mendapatkan kartu ujian, maka pendaftaran Anda sudah selesai, Silahkan lakukan ujian secara offline</li>
                   <li class="mb-3"><i class="fas fa-check-circle"></i> Tunggu Pengumuman Hasil Ujian pada menu <a href="{{ route('admin.anouncement') }}">Pengumuman</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection