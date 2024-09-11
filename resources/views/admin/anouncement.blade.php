@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Anouncement</h4>
                        <p class="text-muted">menu untuk mengatur anouncement / Hasil Pendaftaran apakah siswa diterima atau
                            tidak</p>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Pendaftar</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Pendaftar Lolos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Pendaftar Tidak Lolos</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatable1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No. Pendaftaran</th>
                                                <td>Kartu Ujian</td>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->registration->kode_pendaftaran }}</td>
                                                    <td>
                                                        @if ($item->examCard)
                                                            <a target="_blank"
                                                                href="{{ asset('storage/exam_card/' . $item->examCard->file) }}"
                                                                class="btn btn-primary">Download</a>
                                                        @else
                                                            <span class="text-muted">belum ada Kartu Ujian</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#terimaModal{{ $item->id }}">
                                                            Lolos
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="terimaModal{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="terimaModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="terimaModalLabel">
                                                                            Konfirmasi
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah anda yakin ingin menerima pendaftaran ini?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <form
                                                                            action="{{ route('admin.registration.result', $item->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->id }}">
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $item->id }}">
                                                                            <input type="hidden" name="status"
                                                                                value="pass">
                                                                            <input type="hidden" name="kode_pendaftaran"
                                                                                value="{{ $item->registration->kode_pendaftaran }}">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Terima</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#tolakModal{{ $item->id }}">
                                                            Tidak Lolos
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="tolakModal{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="tolakModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tolakModalLabel">
                                                                            Konfirmasi
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah anda yakin ingin menolak pendaftaran ini?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <form
                                                                            action="{{ route('admin.registration.result', $item->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->id }}">
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $item->id }}">
                                                                            <input type="hidden" name="status"
                                                                                value="not_pass">
                                                                            <input type="hidden" name="kode_pendaftaran"
                                                                                value="{{ $item->registration->kode_pendaftaran }}">
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Tolak</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatable1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No. Pendaftaran</th>
                                                <th>Kartu Ujian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_lolos as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->registration->kode_pendaftaran }}</td>
                                                    <td>
                                                        @if ($item->examCard)
                                                            <a target="_blank"
                                                                href="{{ asset('storage/exam_card/' . $item->examCard->file) }}"
                                                                class="btn btn-primary">Download</a>
                                                        @else
                                                            <span class="text-muted">belum ada Kartu Ujian</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label for="" class="badge bg-success">Lolos</label>
                                                           
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatable1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No. Pendaftaran</th>
                                                <th>Kartu Ujian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_tidak_lolos as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->registration->kode_pendaftaran }}</td>
                                                    <td>
                                                        @if ($item->examCard)
                                                            <a target="_blank"
                                                                href="{{ asset('storage/exam_card/' . $item->examCard->file) }}"
                                                                class="btn btn-primary">Download</a>
                                                        @else
                                                            <span class="text-muted">belum ada Kartu Ujian</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label for="" class="badge bg-danger">Tidak Lolos</label>
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
