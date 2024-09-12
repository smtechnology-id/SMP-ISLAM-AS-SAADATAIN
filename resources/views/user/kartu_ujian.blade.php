@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kartu Tes</h4>
                    </div>
                    @if ($examCard)
                        <div class="row p-5">
                            <div class="col-md-6 text-center d-flex justify-content-center align-items-center flex-column">
                                <img src="{{ asset('storage/exam_card/' . $examCard->file) }}" alt="Kartu Tes"
                                    class="img-fluid rounded"
                                    style="width: 100%; height: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                                <a target="_blank" href="{{ asset('storage/exam_card/' . $examCard->file) }}"
                                    class="btn btn-primary mt-3">Download</a>
                            </div>
                            <div class="col-md-6">
                                <h4 class="font-weight-bold">Jadwal Tes Dan Jadwal Observasi anak & orang tua</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $examCard->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Pendaftaran</th>
                                        <td>#{{ str_pad($examCard->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Tes</th>
                                        <td>
                                            <p class="text-muted">Tertera di kartu Tes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Tes</th>
                                        <td>
                                            <p class="text-muted">Tertera di kartu Tes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi Tes</th>
                                        <td>
                                            <p class="text-muted">Tertera di kartu Tes</p>
                                        </td>
                                    </tr>
                                </table>
                                <h5 class="font-weight-bold">Instruksi</h5>
                                <ul>
                                    <li>Silahkan unduh kartu Tes dan bawa ke lokasi Tes</li>
                                    <li>Lokasi dan Waktu Tes dapat dilihat pada kartu Tes</li>

                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="alert alert-danger">
                                <p>Maaf Kartu Tes Belum Tersedia, Silahkan Tunggu Sampai Admin Memberikan kartu tes</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
