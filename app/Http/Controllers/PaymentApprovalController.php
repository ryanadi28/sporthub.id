<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Gor;
use Illuminate\Support\Facades\Auth;

class PaymentApprovalController extends Controller
{
    public function index()
    {
        // Sederhana: tampilkan semua appointment belum dibayar
        $appointments = Appointment::where('is_paid', false)->orderBy('date', 'asc')->paginate(10);
        return view('dashboard.gor.payments.index', compact('appointments'));
    }

    public function approve(Appointment $appointment)
    {
        $appointment->update(['is_paid' => true]);
        return redirect()->route('gor.payments.index')->with('message', 'Pembayaran disetujui');
    }
}
