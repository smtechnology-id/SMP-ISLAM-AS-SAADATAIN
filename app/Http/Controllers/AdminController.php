<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parents;
use App\Models\Payment;
use App\Models\Document;
use App\Models\Additional;
use App\Models\Notification;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    // registration
    public function registration()
    {
        $registrations = Registration::where('status', '!=', 'accepted')->get();
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

    // anouncement
    public function anouncement()
    {
        $payments = Payment::where('jenis_pembayaran', 'Uang Masuk')->where('status', 'accepted')->get();
        return view('admin.anouncement', compact('payments'));
    }
}
