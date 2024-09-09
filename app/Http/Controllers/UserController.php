<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Payment;
use App\Models\Additional;
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
        
        return view('user.registration', compact('registrations', 'parents', 'additionals', 'payment_accepted', 'payment_pending', 'payment_rejected'));
    }

    public function registrationStore(Request $request) {
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

    public function registrationUpdate(Request $request) {
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
        $registration = Registration::find($request->id);
        $registration->update($validatedData);
        return redirect()->route('user.registration')->with('success', 'Update berhasil!');
    }

    // Parents
    public function parentsStore(Request $request) {
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
    public function parentsUpdate(Request $request) {
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
    public function additionalsStore(Request $request) {
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
    public function additionalsUpdate(Request $request) {
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
    public function paymentStore(Request $request) {
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
        return redirect()->route('user.registration')->with('success', 'Pembayaran berhasil!');
    }
    public function paymentUpdate(Request $request) {
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
}
