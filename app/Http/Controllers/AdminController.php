<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parents;
use App\Models\Payment;
use App\Models\Document;
use App\Models\ExamCard;
use App\Models\Additional;
use App\Models\Notification;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $total_pendaftar = Registration::count();
        $total_diterima = Registration::where('status', 'pass')->count();
        $total_tidak_lolos = Registration::where('status', 'not_pass')->count();
        $total_pendaftar_perlu_diperiksa = Registration::where('status', 'pending')->count();

        $pembayaran_formulir = Payment::where('jenis_pembayaran', 'Formulir')->where('status', 'pending')->count();
        $pembayaran_uang_masuk = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'pending')->count();
        return view('admin.dashboard', compact('total_pendaftar', 'total_diterima', 'total_tidak_lolos', 'total_pendaftar_perlu_diperiksa', 'pembayaran_formulir', 'pembayaran_uang_masuk'));
    }

    // registration
    public function registration()
    {
        $registrations = Registration::where('status', '!=', 'accepted')->where('status', '!=', 'pass')->where('status', '!=', 'not_pass')->get();
        $registrations_accepted = Registration::where('status', 'accepted')->get();
        $registrations_pending = Registration::where('status', 'pending')->get();
        return view('admin.registration', compact('registrations', 'registrations_accepted', 'registrations_pending'));
    }
    public function registrationDetail($id)
    {
        $registration = Registration::find($id);
        $parents = Parents::where('kode_pendaftaran', $registration->kode_pendaftaran)->first();
        $additionals = Additional::where('kode_pendaftaran', $registration->kode_pendaftaran)->first();
        $payment = Payment::where('kode_pendaftaran', $registration->kode_pendaftaran)->first();
        $documents = Document::where('kode_pendaftaran', $registration->kode_pendaftaran)->first();
        return view('admin.registration-detail', compact('registration', 'parents', 'additionals', 'payment', 'documents'));
    }

    public function paymentFormulir()
    {
        $payments = Payment::where('jenis_pembayaran', 'Formulir')->get();
        $payments_pending = Payment::where('jenis_pembayaran', 'Formulir')->where('status', 'pending')->get();
        $payments_accepted = Payment::where('jenis_pembayaran', 'Formulir')->where('status', 'accepted')->get();
        $payments_rejected = Payment::where('jenis_pembayaran', 'Formulir')->where('status', 'rejected')->get();
        return view('admin.payment-formulir', compact('payments', 'payments_pending', 'payments_accepted', 'payments_rejected'));
    }

    // Payment Formulir
    public function paymentFormulirAccept($id)
    {
        $payment = Payment::find($id);
        $payment->status = 'accepted';
        $payment->save();
        return redirect()->back()->with('success', 'Pembayaran formulir telah disetujui');
    }

    public function paymentFormulirReject($id)
    {
        $payment = Payment::find($id);
        $payment->status = 'rejected';
        $payment->save();
        return redirect()->back()->with('success', 'Pembayaran formulir telah ditolak');
    }

    public function paymentFormulirPending($id)
    {
        $payment = Payment::find($id);
        $payment->status = 'pending';
        $payment->save();
        return redirect()->back()->with('success', 'Pembayaran formulir telah ditunda');
    }

    public function registrationReject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }



        $registration = Registration::find($request->id);
        $registration->status = 'rejected';
        $registration->save();

        $notification = new Notification();
        $notification->user_id = $request->user_id;
        $notification->type = $request->type;
        $notification->data = $request->catatan;
        $notification->save();
        return redirect()->back()->with('success', 'Pengajuan telah ditolak');
    }

    public function registrationAccept($id)
    {
        $registration = Registration::find($id);
        $registration->status = 'accepted';
        $registration->save();
        return redirect()->back()->with('success', 'Pengajuan telah diterima');
    }

    // Payment Uang Masuk
    public function paymentUangMasuk()
    {
        $payments = Payment::where('jenis_pembayaran', 'Uang Masuk')->get();
        $payments_pending = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'pending')->get();
        $payments_accepted = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'accepted')->get();
        $payments_rejected = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'rejected')->get();
        return view('admin.payment-uang_masuk', compact('payments', 'payments_pending', 'payments_accepted', 'payments_rejected'));
    }



    // exam card
    public function examCard()
    {
        $payments = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'accepted')->get();
        $examCards = ExamCard::all();
        return view('admin.exam-card', compact('payments', 'examCards'));
    }
    public function examCardUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            // Menggunakan storage untuk menyimpan file
            $file->storeAs('exam_card', $filename, 'public');
            $validatedData['file'] = $filename;
        }

        $examCard = new ExamCard();
        $examCard->user_id = $request->user_id;
        $examCard->kode_pendaftaran = $request->kode_pendaftaran;
        $examCard->file = $filename;
        $examCard->save();
        return redirect()->back()->with('success', 'Kartu ujian telah diupload');
    }
    // anouncement
    public function anouncement()
    {
        $users = User::where('level', 'user')
            ->whereHas('registrations', function ($query) {
                $query->where('status', 'accepted');
            })
            ->whereHas('payment', function ($query) {
                $query->where('jenis_pembayaran', 'Uang Masuk')->where('status', 'accepted');
            })
            ->get();
        $users_lolos = User::whereHas('registrations', function ($query) {
            $query->where('status', 'pass');
        })->get();
        $users_tidak_lolos = User::whereHas('registrations', function ($query) {
            $query->where('status', 'not_pass');
        })->get();
        return view('admin.anouncement', compact('users', 'users_lolos', 'users_tidak_lolos'));
    }

    // pass
    public function registrationPass(Request $request)
    {
        $registration = Registration::find($request->kode_pendaftaran);
        $registration->status = $request->status;
        $registration->save();
        return redirect()->back()->with('success', 'Siswa telah dinyatakan Lolos Pendaftaran');
    }


    // account
    public function account()
    {
        $users = User::where('level', 'user')->get();
        return view('admin.account-data', compact('users'));
    }
    public function gantiPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password telah diubah');
    }
}
