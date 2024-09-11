@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kartu Ujian</h4>
                        <p class="text-muted">menu untuk mengatur kartu ujian</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No. Pendaftaran</th>
                                    <td>Status Pembayaran Formulir </td>
                                    <td>Status Pembayaran Uang Masuk </td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ str_pad($item->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td><label for="" class="badge bg-success">Lunas</label></td>
                                    <td><label for="" class="badge bg-success">Lunas</label></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        @php
                                            $kode_pendaftaran = $item->kode_pendaftaran;
                                            $examCard = $examCards->where('kode_pendaftaran', $kode_pendaftaran)->first();
                                        @endphp
                                        @if ($examCard)
                                            <a target="_blank" href="{{ asset('storage/exam_card/' . $examCard->file) }}"
                                                class="btn btn-primary">Lihat Kartu Ujian</a>
                                        @else
                                       
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#terimaModal{{ $item->kode_pendaftaran }}">
                                            Upload Kartu Ujian
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="terimaModal{{ $item->kode_pendaftaran }}"
                                            tabindex="-1" aria-labelledby="terimaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="terimaModalLabel">Upload Kartu Ujian
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('admin.exam-card.upload') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <input type="file" name="file"
                                                                    class="form-control" required>
                                                            <input type="hidden" name="kode_pendaftaran"
                                                                    value="{{ $item->kode_pendaftaran }}">
                                                            <input type="hidden" name="user_id"
                                                                    value="{{ $item->user_id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
