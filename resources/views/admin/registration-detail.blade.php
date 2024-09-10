@extends('layouts.app')
@section('title', 'Pembayaran Formulir')
@section('active_pendaftaran', 'active-page')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">Pembayaran Formulir ( {{ $registration->nama_lengkap }} -
                                {{ str_pad($registration->kode_pendaftaran, 4, '0', STR_PAD_LEFT) }} )</h5>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                @if ($registration->status != 'rejected')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Tolak Pengajuan
                                    </button>
                                @endif
                                @if ($registration->status != 'accepted')
                                    <a href="{{ route('admin.registration.accept', $registration->id) }}"
                                        class="btn btn-success">Verifikasi</a>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="{{ route('admin.registration.reject')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="catatan">Catatan Pengajuan</label>
                                                    <textarea name="catatan" class="form-control" rows="3" required></textarea>
                                                    <input type="hidden" name="id" value="{{ $registration->id }}">
                                                    <input type="hidden" name="type" value="registration">
                                                    <input type="hidden" name="user_id" value="{{ $registration->user_id }}">
                                                </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Data Keterangan Siswa {{ $registration ? '✔️' : '' }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Data Orang Tua {{ $parents ? '✔️' : '' }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Data Asal Siswa/i {{ $additionals ? '✔️' : '' }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-documents-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-documents" type="button" role="tab"
                                aria-controls="pills-documents" aria-selected="false">Dokumen </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><b>{{ $registration->nama_lengkap }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->jenis_kelamin == 'L')
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td>{{ $registration->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{{ $registration->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Ke</td>
                                        <td>:</td>
                                        <td>{{ $registration->anak_ke }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Saudara Kandung</td>
                                        <td>:</td>
                                        <td>{{ $registration->jumlah_saudara_kandung }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Saudara Tiri</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->jumlah_saudara_tiri)
                                                {{ $registration->jumlah_saudara_tiri }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Saudara Angkat</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->jumlah_saudara_angkat)
                                                {{ $registration->jumlah_saudara_angkat }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Berat Badan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->berat_badan)
                                                {{ $registration->berat_badan }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Badan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->tinggi_badan)
                                                {{ $registration->tinggi_badan }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->golongan_darah)
                                                {{ $registration->golongan_darah }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Penyakit yang Pernah Diderita</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->penyakit_yang_pernah_diderita)
                                                {{ $registration->penyakit_yang_pernah_diderita }}
                                            @else
                                                <label class="text-danger">Belum Diisi</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Lengkap</td>
                                        <td>:</td>
                                        <td>{{ $registration->alamat_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td>{{ $registration->kelurahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{ $registration->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td>{{ $registration->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>:</td>
                                        <td>{{ $registration->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bertempat Tinggal Pada</td>
                                        <td>:</td>
                                        <td>{{ $registration->bertempat_tinggal_pada }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            @if ($registration->status == 'Diterima')
                                                <span class="badge bg-success">{{ $registration->status }}</span>
                                            @elseif ($registration->status == 'Ditolak')
                                                <span class="badge bg-danger">{{ $registration->status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $registration->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @if ($parents)
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $parents->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ayah</td>
                                            <td>:</td>
                                            <td>{{ $parents->nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu</td>
                                            <td>:</td>
                                            <td>{{ $parents->nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Ayah</td>
                                            <td>:</td>
                                            <td>{{ $parents->pendidikan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Ibu</td>
                                            <td>:</td>
                                            <td>{{ $parents->pendidikan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ayah</td>
                                            <td>:</td>
                                            <td>{{ $parents->pekerjaan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td>:</td>
                                            <td>{{ $parents->pekerjaan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Wali</td>
                                            <td>:</td>
                                            <td>{{ $parents->nama_wali ? $parents->nama_wali : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Hubungan Keluarga</td>
                                            <td>:</td>
                                            <td>{{ $parents->hubungan_keluarga ? $parents->hubungan_keluarga : '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <p>Data Orang Tua Belum Diisi</p>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            @if ($additionals)
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $additionals->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Masuk Sebagai</td>
                                            <td>:</td>
                                            <td>{{ $additionals->masuk_sebagai }}</td>
                                        </tr>
                                        <tr>
                                            <td>Asal Sekolah</td>
                                            <td>:</td>
                                            <td>{{ $additionals->asal_sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lulusan Tahun</td>
                                            <td>:</td>
                                            <td>{{ $additionals->lulusan_tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td>No STTB</td>
                                            <td>:</td>
                                            <td>{{ $additionals->no_sttb }}</td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td>{{ $additionals->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td>No Peserta UASBN</td>
                                            <td>:</td>
                                            <td>{{ $additionals->no_peserta_uasbn }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Diterima</td>
                                            <td>:</td>
                                            <td>{{ $additionals->tanggal_diterima }}</td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <p>Data Orang Tua Belum Diisi</p>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="pills-documents" role="tabpanel"
                            aria-labelledby="pills-documents-tab">
                            @if ($documents)
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Ijazah</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->ijazah)
                                                    <a href="{{ asset('storage/ijazah/' . $documents->ijazah) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SKHU</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->skhu)
                                                    <a href="{{ asset('storage/skhu/' . $documents->skhu) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Akte Kelahiran</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->akte_kelahiran)
                                                    <a href="{{ asset('storage/akte_kelahiran/' . $documents->akte_kelahiran) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->nisn)
                                                    <a href="{{ asset('storage/nisn/' . $documents->nisn) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Raport</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->raport)
                                                    <a href="{{ asset('storage/raport/' . $documents->raport) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KTP Orang Tua</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->ktp_orang_tua)
                                                    <a href="{{ asset('storage/ktp_orang_tua/' . $documents->ktp_orang_tua) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Surat Kematian</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->surat_kematian)
                                                    <a href="{{ asset('storage/surat_kematian/' . $documents->surat_kematian) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KK</td>
                                            <td>:</td>
                                            <td>
                                                @if ($documents->kk)
                                                    <a href="{{ asset('storage/kk/' . $documents->kk) }}"
                                                        target="_blank">
                                                        Lihat Berkas
                                                    </a>
                                                @else
                                                    <label class="text-danger">Belum Diisi</label>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <p>Data Orang Tua Belum Diisi</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
