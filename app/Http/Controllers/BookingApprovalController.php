<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingApprovalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Admin GOR hanya lihat booking di lapangan milik GOR-nya
        if ($user->isGorAdmin()) {
            $gorIds = $user->gors()->pluck('id');
            $bookings = Booking::whereHas('field', fn($q) => $q->whereIn('gor_id', $gorIds))
                ->orderBy('created_at', 'desc')
                ->with(['user', 'field.gor'])
                ->paginate(15);
        } else {
            // Admin Platform lihat semua
            $bookings = Booking::orderBy('created_at', 'desc')
                ->with(['user', 'field.gor'])
                ->paginate(15);
        }

        return view('dashboard.gor.bookings.index', compact('bookings'));
    }

    public function approve(Booking $booking)
    {
        $this->authorizeBooking($booking);
        $booking->update(['status' => 'approved']);
        return back()->with('message', 'Booking disetujui');
    }

    public function reject(Booking $booking)
    {
        $this->authorizeBooking($booking);
        $booking->update(['status' => 'rejected']);
        return back()->with('message', 'Booking ditolak');
    }

    private function authorizeBooking(Booking $booking): void
    {
        $user = Auth::user();
        if ($user->isAdminPlatform()) return;

        $gorIds = $user->gors()->pluck('id')->toArray();
        if (!in_array($booking->field->gor_id, $gorIds)) {
            abort(403);
        }
    }
}
