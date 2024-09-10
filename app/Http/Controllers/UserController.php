<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Payment;
use App\Models\Document;
use App\Models\ExamCard;
use App\Models\Additional;
use App\Models\Notification;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function registration()
    {
        $registrations = Registration::where('user_id', Auth::user()->id)->first();
        $parents = Parents::where('user_id', Auth::user()->id)->first();
        $additionals = Additional::where('user_id', Auth::user()->id)->first();
        $payment_accepted = Payment::where('user_id', Auth::user()->id)->where('status', 'accepted')->first();
        $payment_pending = Payment::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
        $payment_rejected = Payment::where('user_id', Auth::user()->id)->where('status', 'rejected')->first();

        $notifications = Notification::where('user_id', Auth::user()->id)->where('type', 'registration')->latest()->first();
        $documents = Document::where('user_id', Auth::user()->id)->first();
        return view('user.registration', compact('registrations', 'parents', 'additionals', 'payment_accepted', 'payment_pending', 'payment_rejected', 'documents', 'notifications'));
    }

    public function registrationStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'anak_ke' => 'required|integer',
            'jumlah_saudara_kandung' => 'nullable|integer',
            'jumlah_saudara_tiri' => 'nullable|integer',
            'jumlah_saudara_angkat' => 'nullable|integer',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|integer',
            'golongan_darah' => 'nullable|string|max:3',
            'penyakit_yang_pernah_diderita' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'bertempat_tinggal_pada' => 'nullable|string',
            'kode_pendaftaran' => 'required|integer',
        ]);
        $status = 'pending';
        $user_id = Auth::user()->id;
        $validatedData['user_id'] = $user_id;
        $validatedData['status'] = $status;
        Registration::create($validatedData);

        // Redirect atau memberikan respon
        return redirect()->route('user.registration')->with('success', 'Pendaftaran berhasil!');
    }

    public function registrationUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'anak_ke' => 'required|integer',
            'jumlah_saudara_kandung' => 'nullable|integer',
            'jumlah_saudara_tiri' => 'nullable|integer',
            'jumlah_saudara_angkat' => 'nullable|integer',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|integer',
            'golongan_darah' => 'nullable|string|max:3',
            'penyakit_yang_pernah_diderita' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'bertempat_tinggal_pada' => 'required|string',
        ]);
        $status = 'pending';
        $validatedData['status'] = $status;
        $registration = Registration::find($request->id);
        $registration->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Update berhasil!');
    }

    // Parents
    public function parentsStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_keluarga' => 'nullable|string|max:255',
        ]);
        $kode_pendaftaran = Registration::where('user_id', Auth::user()->id)->first()->kode_pendaftaran;
        $validatedData['kode_pendaftaran'] = $kode_pendaftaran;
        $user_id = Auth::user()->id;
        $validatedData['user_id'] = $user_id;
        Parents::create($validatedData);
        return redirect()->route('user.registration')->with('success', 'Pendaftaran berhasil!');
    }
    public function parentsUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_keluarga' => 'nullable|string|max:255',
        ]);

        $parents = Parents::find($request->id);
        $parents->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Update berhasil!');
    }

    // Additional
    public function additionalsStore(Request $request)
    {
        $validatedData = $request->validate([
            'masuk_sebagai' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'lulusan_tahun' => 'required|string|max:255',
            'no_sttb' => 'required|string|max:255',
            'nisn' => 'required|string|max:255',
            'no_peserta_uasbn' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
        ]);
        $kode_pendaftaran = Registration::where('user_id', Auth::user()->id)->first()->kode_pendaftaran;
        $validatedData['kode_pendaftaran'] = $kode_pendaftaran;
        $user_id = Auth::user()->id;
        $validatedData['user_id'] = $user_id;
        Additional::create($validatedData);
        return redirect()->route('user.registration')->with('success', 'Pendaftaran berhasil!');
    }
    public function additionalsUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'masuk_sebagai' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'lulusan_tahun' => 'required|string|max:255',
            'no_sttb' => 'required|string|max:255',
            'nisn' => 'required|string|max:255',
            'no_peserta_uasbn' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
        ]);
        $additionals = Additional::find($request->id);
        if (!$additionals) {
            return redirect()->route('user.registration')->with('error', 'Data tidak ditemukan!');
        }
        $additionals->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Update berhasil!');
    }

    // Payment
    public function paymentStore(Request $request)
    {
        $validatedData = $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'user_id' => 'required|integer',
            'jenis_pembayaran' => 'required|string|max:255',
        ]);
        $status = 'pending';
        // Cek kode Pendaftaran terakhir di Table Registration
        $last_registration = Registration::orderBy('kode_pendaftaran', 'desc')->first();
        if ($last_registration == null) {
            $kode_pendaftaran = 1;
        } else {
            $kode_pendaftaran = $last_registration->kode_pendaftaran + 1;
        }


        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('bukti_pembayaran', $filename, 'public');
            $validatedData['bukti_pembayaran'] = $filename;
        }
        $validatedData['status'] = $status;
        $validatedData['kode_pendaftaran'] = $kode_pendaftaran;
        $validatedData['user_id'] = Auth::user()->id;
        Payment::create($validatedData);
        return redirect()->back()->with('success', 'Pembayaran berhasil!');
    }
    public function paymentUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
        ]);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('bukti_pembayaran', $filename, 'public');
            $validatedData['bukti_pembayaran'] = $filename;
        }
        $status = 'pending';
        $validatedData['status'] = $status;
        $payments = Payment::find($request->id);
        $payments->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Pembayaran berhasil!');
    }

    // Document

    public function documentsStore(Request $request)
    {
        $validatedData = $request->validate([
            'ijazah' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'skhu' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'akte_kelahiran' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'nisn' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'raport' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'ktp_orang_tua' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'surat_kematian' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'kk' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'pas_foto_2x3' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'pas_foto_3x4' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
        ]);
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('ijazah', $filename, 'public');
            $validatedData['ijazah'] = $filename;
        }
        if ($request->hasFile('skhu')) {
            $file = $request->file('skhu');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('skhu', $filename, 'public');
            $validatedData['skhu'] = $filename;
        }
        if ($request->hasFile('akte_kelahiran')) {
            $file = $request->file('akte_kelahiran');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('akte_kelahiran', $filename, 'public');
            $validatedData['akte_kelahiran'] = $filename;
        }
        if ($request->hasFile('nisn')) {
            $file = $request->file('nisn');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('nisn', $filename, 'public');
            $validatedData['nisn'] = $filename;
        }
        if ($request->hasFile('raport')) {
            $file = $request->file('raport');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('raport', $filename, 'public');
            $validatedData['raport'] = $filename;
        }
        if ($request->hasFile('ktp_orang_tua')) {
            $file = $request->file('ktp_orang_tua');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('ktp_orang_tua', $filename, 'public');
            $validatedData['ktp_orang_tua'] = $filename;
        }
        if ($request->hasFile('surat_kematian')) {
            $file = $request->file('surat_kematian');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('surat_kematian', $filename, 'public');
            $validatedData['surat_kematian'] = $filename;
        }
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('kk', $filename, 'public');
            $validatedData['kk'] = $filename;
        }
        if ($request->hasFile('pas_foto_2x3')) {
            $file = $request->file('pas_foto_2x3');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('pas_foto_2x3', $filename, 'public');
            $validatedData['pas_foto_2x3'] = $filename;
        }
        if ($request->hasFile('pas_foto_3x4')) {
            $file = $request->file('pas_foto_3x4');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('pas_foto_3x4', $filename, 'public');
            $validatedData['pas_foto_3x4'] = $filename;
        }
        $kode_pendaftaran = Registration::where('user_id', Auth::user()->id)->first()->kode_pendaftaran;
        $validatedData['kode_pendaftaran'] = $kode_pendaftaran;
        $user_id = Auth::user()->id;
        $validatedData['user_id'] = $user_id;
        Document::create($validatedData);
        return redirect()->route('user.registration')->with('success', 'Upload Dokumen berhasil!');
    }

    public function documentsUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'ijazah' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'skhu' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'akte_kelahiran' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'nisn' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'raport' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'ktp_orang_tua' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'surat_kematian' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'kk' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'pas_foto_2x3' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
            'pas_foto_3x4' => 'file|mimes:jpg,jpeg,png,pdf|max:5048', // Tambahkan mimes dan max
        ]);
        $documents = Document::find($request->id);
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('ijazah', $filename, 'public');
            $validatedData['ijazah'] = $filename;
        }
        if ($request->hasFile('skhu')) {
            $file = $request->file('skhu');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('skhu', $filename, 'public');
            $validatedData['skhu'] = $filename;
        }
        if ($request->hasFile('akte_kelahiran')) {
            $file = $request->file('akte_kelahiran');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('akte_kelahiran', $filename, 'public');
            $validatedData['akte_kelahiran'] = $filename;
        }
        if ($request->hasFile('nisn')) {
            $file = $request->file('nisn');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('nisn', $filename, 'public');
            $validatedData['nisn'] = $filename;
        }
        if ($request->hasFile('raport')) {
            $file = $request->file('raport');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('raport', $filename, 'public');
            $validatedData['raport'] = $filename;
        }
        if ($request->hasFile('ktp_orang_tua')) {
            $file = $request->file('ktp_orang_tua');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('ktp_orang_tua', $filename, 'public');
            $validatedData['ktp_orang_tua'] = $filename;
        }
        if ($request->hasFile('surat_kematian')) {
            $file = $request->file('surat_kematian');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('surat_kematian', $filename, 'public');
            $validatedData['surat_kematian'] = $filename;
        }
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('kk', $filename, 'public');
            $validatedData['kk'] = $filename;
        }
        if ($request->hasFile('pas_foto_2x3')) {
            $file = $request->file('pas_foto_2x3');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('pas_foto_2x3', $filename, 'public');
            $validatedData['pas_foto_2x3'] = $filename;
        }
        if ($request->hasFile('pas_foto_3x4')) {
            $file = $request->file('pas_foto_3x4');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('pas_foto_3x4', $filename, 'public');
            $validatedData['pas_foto_3x4'] = $filename;
        }
        $documents->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Upload Dokumen berhasil!');
    }


    // Pembayaran
    public function pembayaran()
    {
        $registration = Registration::where('user_id', Auth::user()->id)->first();
        $payment = Payment::where('user_id', Auth::user()->id)->where('jenis_pembayaran', 'Uang Masuk')->first();
        return view('user.pembayaran', compact('registration', 'payment'));
    }

    // Kartu Ujian
    public function kartuUjian()
    {
        $examCard = ExamCard::where('user_id', Auth::user()->id)->first();
        return view('user.kartu_ujian', compact('examCard'));
    }
}
