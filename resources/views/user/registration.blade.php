@extends('layouts.app')
@section('title', 'Data Pendaftaran')
@section('active_pendaftaran', 'active-page')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Formulir Pendaftaran</h5>
                    @if ($payment_accepted)
                        @if ($registrations)
                            @if ($parents)
                                @if ($additionals)
                                    @if ($registrations->status == 'pending')
                                        <div class="alert alert-warning">
                                            <p>Pendaftaran sedang di verifikasi oleh admin Mohon tunggu sampai status
                                                berubah menjadi diterima</p>
                                        </div>
                                    @elseif ($registrations->status == 'accepted')
                                        <div class="alert alert-success">
                                            <p>Pendaftaran diterima, Silahkan melakukan ke Menu <a class="text-white" href="{{ route('user.pembayaran') }}">Pembayaran</a></p>
                                        </div>
                                    @elseif ($registrations->status == 'rejected')
                                        <div class="alert alert-danger">
                                            <p>Pendaftaran ditolak</p>
                                        </div>
                                        @if ($notifications)
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <p style="font-size: 14px"><strong>Pesan dari admin :</strong> {{ $notifications->data }}</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif

                        <div class="accordion accordion-separated" id="accordionSeparatedExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeparatedOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeparatedOne" aria-expanded="true"
                                        aria-controls="collapsSeparatedeOne">
                                        Keterangan Siswa {{ $registrations ? '✔️' : '' }}
                                    </button>
                                </h2>
                                <div id="collapseSeparatedOne"
                                    class="accordion-collapse collapse {{ $registrations ? '' : 'show' }}"
                                    aria-labelledby="headingSeparatedOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @if ($registrations)
                                            <form action="{{ route('user.registration.update') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Nama Lengkap <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td> <input type="text" class="form-control" name="nama_lengkap"
                                                                required value="{{ $registrations->nama_lengkap }}"></td>
                                                        <input type="hidden" name="id"
                                                            value="{{ $registrations->id }}">

                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="radio" name="jenis_kelamin" id="radio1"
                                                                value="L"
                                                                {{ $registrations->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="radio1">Laki-laki</label>
                                                            <input type="radio" name="jenis_kelamin" id="radio2"
                                                                value="P"
                                                                {{ $registrations->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="radio2">Perempuan</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Lahir <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="tempat_lahir"
                                                                required value="{{ $registrations->tempat_lahir }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="date" class="form-control" name="tanggal_lahir"
                                                                required value="{{ $registrations->tanggal_lahir }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Anak Ke <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control" name="anak_ke"
                                                                required value="{{ $registrations->anak_ke }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Saudara</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="">Kandung</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_kandung"
                                                                        value="{{ $registrations->jumlah_saudara_kandung }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Tiri</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_tiri"
                                                                        value="{{ $registrations->jumlah_saudara_tiri }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Angkat</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_angkat"
                                                                        value="{{ $registrations->jumlah_saudara_angkat }}">
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berat Badan (kg)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" step="0.1" class="form-control"
                                                                name="berat_badan" placeholder="Opsional"
                                                                value="{{ $registrations->berat_badan }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tinggi Badan (cm)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="tinggi_badan" placeholder="Opsional"
                                                                value="{{ $registrations->tinggi_badan }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Golongan Darah</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="golongan_darah" placeholder="Opsional"
                                                                value="{{ $registrations->golongan_darah }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penyakit yang Pernah Diderita</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="penyakit_yang_pernah_diderita"
                                                                placeholder="Opsional"
                                                                value="{{ $registrations->penyakit_yang_pernah_diderita }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Lengkap <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <textarea class="form-control" name="alamat_lengkap" required>{{ $registrations->alamat_lengkap }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelurahan <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kelurahan"
                                                                required value="{{ $registrations->kelurahan }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kecamatan"
                                                                required value="{{ $registrations->kecamatan }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kabupaten"
                                                                required value="{{ $registrations->kabupaten }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telephone <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="telephone"
                                                                required value="{{ $registrations->telephone }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bertempat Tinggal Pada</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio1" value="Orang Tua"
                                                                        {{ $registrations->bertempat_tinggal_pada == 'Orang Tua' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="radio1">Orang
                                                                        Tua</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio2" value="Saudara"
                                                                        {{ $registrations->bertempat_tinggal_pada == 'Saudara' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="radio2">Saudara</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio3" value="Kost"
                                                                        {{ $registrations->bertempat_tinggal_pada == 'Kost' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="radio3">Kost</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio4" value="Asrama"
                                                                        {{ $registrations->bertempat_tinggal_pada == 'Asrama' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="radio4">Asrama</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio5" value="Lainnya"
                                                                        {{ $registrations->bertempat_tinggal_pada == 'Lainnya' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="radio5">Lainnya</label>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.registration.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Nama Lengkap <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td> <input type="text" class="form-control"
                                                                name="nama_lengkap" required
                                                                value="{{ auth()->user()->name }}"></td>
                                                        <input type="hidden" name="kode_pendaftaran"
                                                            value="{{ $payment_accepted->kode_pendaftaran }}">
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="radio" name="jenis_kelamin" id="radio1"
                                                                value="L">
                                                            <label class="form-check-label"
                                                                for="radio1">Laki-laki</label>
                                                            <input type="radio" name="jenis_kelamin" id="radio2"
                                                                value="P">
                                                            <label class="form-check-label"
                                                                for="radio2">Perempuan</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Lahir <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Anak Ke <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control" name="anak_ke"
                                                                required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Saudara</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="">Kandung</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_kandung">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Tiri</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_tiri">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Angkat</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah_saudara_angkat">
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berat Badan (kg)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" step="0.1" class="form-control"
                                                                name="berat_badan" placeholder="Opsional">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tinggi Badan (cm)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="tinggi_badan" placeholder="Opsional">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Golongan Darah</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="golongan_darah" placeholder="Opsional">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penyakit yang Pernah Diderita</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="penyakit_yang_pernah_diderita"
                                                                placeholder="Opsional">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Lengkap <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <textarea class="form-control" name="alamat_lengkap" required></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelurahan <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kelurahan"
                                                                required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kecamatan"
                                                                required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="kabupaten"
                                                                required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telephone <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="telephone"
                                                                required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bertempat Tinggal Pada</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio1" value="Orang Tua">
                                                                    <label class="form-check-label" for="radio1">Orang
                                                                        Tua</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio2" value="Saudara">
                                                                    <label class="form-check-label"
                                                                        for="radio2">Saudara</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio3" value="Kost">
                                                                    <label class="form-check-label"
                                                                        for="radio3">Kost</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio4" value="Asrama">
                                                                    <label class="form-check-label"
                                                                        for="radio4">Asrama</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="radio" name="bertempat_tinggal_pada"
                                                                        id="radio5" value="Lainnya">
                                                                    <label class="form-check-label"
                                                                        for="radio5">Lainnya</label>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeparatedTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeparatedTwo" aria-expanded="false"
                                        aria-controls="collapseSeparatedTwo">
                                        Orang Tua / Wali {{ $parents ? '✔️' : '' }}

                                    </button>
                                </h2>
                                <div id="collapseSeparatedTwo"
                                    class="accordion-collapse collapse {{ $parents ? '' : 'show' }}"
                                    aria-labelledby="headingSeparatedTwo" data-bs-parent="#accordionSeparatedExample">
                                    <div class="accordion-body">
                                        @if ($parents)
                                            <form action="{{ route('user.parents.update') }}" method="post">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Nama Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_ayah" class="form-control"
                                                                placeholder="Nama Ayah"
                                                                value="{{ $parents->nama_ayah }}"></td>
                                                        <input type="hidden" name="id"
                                                            value="{{ $parents->id }}">
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_ibu" class="form-control"
                                                                placeholder="Nama Ibu" value="{{ $parents->nama_ibu }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pendidikan_ayah"
                                                                class="form-control" placeholder="Pendidikan Ayah"
                                                                value="{{ $parents->pendidikan_ayah }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pendidikan_ibu"
                                                                class="form-control" placeholder="Pendidikan Ibu"
                                                                value="{{ $parents->pendidikan_ibu }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pekerjaan_ayah"
                                                                class="form-control" placeholder="Pekerjaan Ayah"
                                                                value="{{ $parents->pekerjaan_ayah }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pekerjaan_ibu"
                                                                class="form-control" placeholder="Pekerjaan Ibu"
                                                                value="{{ $parents->pekerjaan_ibu }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Wali</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_wali" class="form-control"
                                                                placeholder="Nama Wali (Opsional)"
                                                                value="{{ $parents->nama_wali }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hubungan Keluarga</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="hubungan_keluarga"
                                                                class="form-control"
                                                                placeholder="Hubungan Keluarga (Opsional)"
                                                                value="{{ $parents->hubungan_keluarga }}"></td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.parents.store') }}" method="post">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Nama Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_ayah" class="form-control"
                                                                placeholder="Nama Ayah"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_ibu" class="form-control"
                                                                placeholder="Nama Ibu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pendidikan_ayah"
                                                                class="form-control" placeholder="Pendidikan Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pendidikan_ibu"
                                                                class="form-control" placeholder="Pendidikan Ibu">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ayah <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pekerjaan_ayah"
                                                                class="form-control" placeholder="Pekerjaan Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ibu <span class="text-danger">*</span></td>
                                                        <td>:</td>
                                                        <td><input type="text" name="pekerjaan_ibu"
                                                                class="form-control" placeholder="Pekerjaan Ibu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Wali</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nama_wali" class="form-control"
                                                                placeholder="Nama Wali (Opsional)"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hubungan Keluarga</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="hubungan_keluarga"
                                                                class="form-control"
                                                                placeholder="Hubungan Keluarga (Opsional)"></td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeparatedThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeparatedThree" aria-expanded="false"
                                        aria-controls="collapseSeparatedThree">
                                        Asal Siswa {{ $additionals ? '✔️' : 'Tambah' }}
                                    </button>
                                </h2>
                                <div id="collapseSeparatedThree"
                                    class="accordion-collapse collapse {{ $additionals ? '' : 'show' }}"
                                    aria-labelledby="headingSeparatedThree" data-bs-parent="#accordionSeparatedExample">
                                    <div class="accordion-body">
                                        @if ($additionals)
                                            <form action="{{ route('user.additionals.update') }}" method="post">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Asal Sekolah</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="asal_sekolah"
                                                                class="form-control" placeholder="Asal Sekolah"
                                                                value="{{ $additionals->asal_sekolah }}"></td>
                                                        <input type="hidden" name="id"
                                                            value="{{ $additionals->id }}">
                                                    </tr>
                                                    <tr>
                                                        <td>Masuk Sebagai</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="radio" name="masuk_sebagai" id="radio1"
                                                                value="Pindahan"
                                                                {{ $additionals->masuk_sebagai == 'Pindahan' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="radio1">Pindahan</label>
                                                            <input type="radio" name="masuk_sebagai" id="radio2"
                                                                value="Siswa Baru"
                                                                {{ $additionals->masuk_sebagai == 'Siswa Baru' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="radio2">Siswa
                                                                Baru</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lulusan Tahun</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="lulusan_tahun"
                                                                class="form-control" placeholder="Lulusan Tahun"
                                                                value="{{ $additionals->lulusan_tahun }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No STTB</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="no_sttb" class="form-control"
                                                                placeholder="No STTB"
                                                                value="{{ $additionals->no_sttb }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NISN</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nisn" class="form-control"
                                                                placeholder="NISN" value="{{ $additionals->nisn }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Peserta UASBN</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="no_peserta_uasbn"
                                                                class="form-control" placeholder="No Peserta UASBN"
                                                                value="{{ $additionals->no_peserta_uasbn }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Diterima</td>
                                                        <td>:</td>
                                                        <td><input type="date" name="tanggal_diterima"
                                                                class="form-control" placeholder="Tanggal Diterima"
                                                                value="{{ $additionals->tanggal_diterima }}"></td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.additionals.store') }}" method="post">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Asal Sekolah</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="asal_sekolah"
                                                                class="form-control" placeholder="Asal Sekolah"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Masuk Sebagai</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="radio" name="masuk_sebagai" id="radio1"
                                                                value="Pindahan">
                                                            <label class="form-check-label"
                                                                for="radio1">Pindahan</label>
                                                            <input type="radio" name="masuk_sebagai" id="radio2"
                                                                value="Siswa Baru">
                                                            <label class="form-check-label" for="radio2">Siswa
                                                                Baru</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lulusan Tahun</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="lulusan_tahun"
                                                                class="form-control" placeholder="Lulusan Tahun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No STTB</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="no_sttb" class="form-control"
                                                                placeholder="No STTB"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NISN</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="nisn" class="form-control"
                                                                placeholder="NISN"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Peserta UASBN</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="no_peserta_uasbn"
                                                                class="form-control" placeholder="No Peserta UASBN">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Diterima</td>
                                                        <td>:</td>
                                                        <td><input type="date" name="tanggal_diterima"
                                                                class="form-control" placeholder="Tanggal Diterima">
                                                        </td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeparatedFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeparatedFour" aria-expanded="false"
                                        aria-controls="collapseSeparatedFour">
                                        Dokumen
                                    </button>
                                </h2>
                                <div id="collapseSeparatedFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeparatedFour" data-bs-parent="#accordionSeparatedExample">
                                    <div class="accordion-body">
                                        @if ($documents)
                                            <form action="{{ route('user.documents.update') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Scan Ijasah SD / MI yang telah Dilegalisir @if ($documents->ijazah)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="ijazah" class="form-control">
                                                            @if ($documents->ijazah)
                                                                <a href="{{ asset('storage/ijazah/' . $documents->ijazah) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                        <input type="hidden" name="id"
                                                            value="{{ $documents->id }}">
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Surat Keterangan Hasil Ujian (SKHU) @if ($documents->skhu)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="skhu" class="form-control">
                                                            @if ($documents->skhu)
                                                                <a href="{{ asset('storage/skhu/' . $documents->skhu) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kartu Keluarga @if ($documents->kk)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="kk" class="form-control">
                                                            @if ($documents->kk)
                                                                <a href="{{ asset('storage/kk/' . $documents->kk) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan KTP Orang Tua / Wali @if ($documents->ktp_orang_tua)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="ktp_orang_tua"
                                                                class="form-control">
                                                            @if ($documents->ktp_orang_tua)
                                                                <a href="{{ asset('storage/ktp_orang_tua/' . $documents->ktp_orang_tua) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Akte Kelahiran @if ($documents->akte_kelahiran)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="akte_kelahiran"
                                                                class="form-control">
                                                            @if ($documents->akte_kelahiran)
                                                                <a href="{{ asset('storage/akte_kelahiran/' . $documents->akte_kelahiran) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Raport @if ($documents->raport)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="raport" class="form-control">
                                                            @if ($documents->raport)
                                                                <a href="{{ asset('storage/raport/' . $documents->raport) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Surat Kematian (jika ada) @if ($documents->surat_kematian)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="surat_kematian"
                                                                class="form-control">
                                                            @if ($documents->surat_kematian)
                                                                <a href="{{ asset('storage/surat_kematian/' . $documents->surat_kematian) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pas Foto 2x3 @if ($documents->pas_foto_2x3)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="pas_foto_2x3"
                                                                class="form-control">
                                                            @if ($documents->pas_foto_2x3)
                                                                <a href="{{ asset('storage/pas_foto_2x3/' . $documents->pas_foto_2x3) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pas Foto 3x4 @if ($documents->pas_foto_3x4)
                                                                ✔️
                                                            @endif
                                                        </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="pas_foto_3x4"
                                                                class="form-control">
                                                            @if ($documents->pas_foto_3x4)
                                                                <a href="{{ asset('storage/pas_foto_3x4/' . $documents->pas_foto_3x4) }}"
                                                                    target="_blank">Lihat</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        @else
                                            <form action="{{ route('user.documents.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Scan Ijasah SD / MI yang telah Dilegalisir</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="ijazah" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Surat Keterangan Hasil Ujian (SKHU)</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="skhu" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kartu Keluarga </td>
                                                        <td>:</td>
                                                        <td><input type="file" name="kk" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan KTP Orang Tua / Wali</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="ktp_orang_tua"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Akte Kelahiran</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="akte_kelahiran"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Raport</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="raport" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Scan Surat Kematian (jika ada)</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="surat_kematian"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pas Foto 2x3</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="pas_foto_2x3"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pas Foto 3x4</td>
                                                        <td>:</td>
                                                        <td><input type="file" name="pas_foto_3x4"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($payment_pending)
                        <div class="alert alert-warning">
                            <p>Pembayaran menunggu konfirmasi Admin</p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="container mt-5">
                                    <div class="row bg-light p-4 rounded">
                                        <!-- Payment Details -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Bank Pembayaran:</p>
                                                    <img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                                        alt="BNI Logo" class="img-fluid mb-3" style="max-width: 150px;">
                                                    <h5>Nomor Rekening Pembayaran Formulir:</h5>
                                                    <div class="border p-3 rounded mb-3">
                                                        8581045301419027
                                                    </div>
                                                    <h5>Jumlah Pembayaran</h5>
                                                    <div class="border p-3 rounded">
                                                        Rp. 150.000
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

                                                    <div class="d-grid gap-2 mt-3">
                                                        <button class="btn btn-outline-primary">Cara
                                                            Pembayaran</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($payment_rejected)
                        <div class="alert alert-danger">
                            <p>Pembayaran ditolak</p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="container mt-5">
                                    <div class="row bg-light p-4 rounded">
                                        <!-- Payment Details -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Bank Pembayaran:</p>
                                                    <img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                                        alt="BNI Logo" class="img-fluid mb-3" style="max-width: 150px;">
                                                    <h5>Nomor Rekening Pembayaran Formulir:</h5>
                                                    <div class="border p-3 rounded mb-3">
                                                        8581045301419027
                                                    </div>
                                                    <h5>Jumlah Pembayaran</h5>
                                                    <div class="border p-3 rounded">
                                                        Rp. 150.000
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

                                                    <div class="alert alert-danger">
                                                        <p>Pembayaran ditolak, silahkan upload ulang bukti
                                                            pembayaran</p>
                                                    </div>
                                                    <form action="{{ route('user.payment.update') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                            <input type="file" name="bukti_pembayaran"
                                                                class="form-control" required>
                                                            <small class="text-muted">*Silahkan Upload bukti
                                                                pembayaran
                                                                sebagai bukti pembayaran.</small>

                                                            <input type="hidden" name="id"
                                                                value="{{ $payment_rejected->id }}">

                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary">Kirim
                                                                Ulang Bukti
                                                                Pembayaran</button>
                                                        </div>
                                                    </form>
                                                    <div class="d-grid gap-2 mt-3">
                                                        <button class="btn btn-outline-primary">Cara
                                                            Pembayaran</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-primary">
                            <p>Silahkan melakukan pembayaran formulir terlebih dahulu</p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="container mt-5">
                                    <div class="row bg-light p-4 rounded">
                                        <!-- Payment Details -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Bank Pembayaran:</p>
                                                    <img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BNI-512.png"
                                                        alt="BNI Logo" class="img-fluid mb-3" style="max-width: 150px;">
                                                    <h5>Nomor Rekening Pembayaran Formulir:</h5>
                                                    <div class="border p-3 rounded mb-3">
                                                        8581045301419027
                                                    </div>
                                                    <h5>Jumlah Pembayaran</h5>
                                                    <div class="border p-3 rounded">
                                                        Rp. 150.000
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
                                                    <form action="{{ route('user.payment.store') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                            <input type="file" name="bukti_pembayaran"
                                                                class="form-control" required>
                                                            <small class="text-muted">*Silahkan Upload bukti
                                                                pembayaran
                                                                sebagai bukti pembayaran.</small>

                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->user()->id }}">
                                                            <input type="hidden" name="jenis_pembayaran"
                                                                value="Formulir">
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary">Kirim
                                                                Bukti
                                                                Pembayaran</button>
                                                        </div>
                                                    </form>
                                                    <div class="d-grid gap-2 mt-3">
                                                        <button class="btn btn-outline-primary">Cara
                                                            Pembayaran</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
