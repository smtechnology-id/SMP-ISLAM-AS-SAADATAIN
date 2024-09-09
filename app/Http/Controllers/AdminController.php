<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    // registration
    public function registration()
    {
        $registrations = Registration::all();
        return view('admin.registration', compact('registrations'));
    }

    public function paymentFormulir()
    {
        $payments = Payment::where('jenis_pembayaran', 'Formulir')->get();
        return view('admin.payment-formulir', compact('payments'));
    }
}
