<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerBookingController extends Controller
{
    /**
     * Booking per GOR: tampilkan form booking dengan dropdown lapangan dan jadwal dinamis
     */
    public function bookingGor(Gor $gor)
    {
        // Ambil semua lapangan aktif milik GOR
        $fields = $gor->fields()->where('is_hidden', false)->get();
        return view('booking.gor', compact('gor', 'fields'));
    }
    public function index()
    {
        $gors = Gor::where('status', true)->with('fields')->get();
        return view('booking.index', compact('gors'));
    }

    public function showField(Field $field)
    {
        $field->load(['gor', 'schedules']);
        return view('booking.field', compact('field'));
    }

    public function create(Field $field)
    {
        $field->load(['gor', 'schedules']);
        return view('booking.create', compact('field'));
    }

    public function store(Request $request, Field $field)
    {
        $data = $request->validate([
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'bukti_transfer' => 'nullable|image|max:2048',
            'catatan' => 'nullable|string|max:500',
        ]);

        // Check if booking time has passed (for today)
        if ($data['tanggal'] === now()->format('Y-m-d')) {
            $bookingTime = \Carbon\Carbon::createFromFormat('H:i', $data['jam_mulai']);
            if ($bookingTime->lessThanOrEqualTo(now())) {
                return back()->withErrors(['jam_mulai' => 'Jam booking sudah lewat. Silakan pilih jam yang belum lewat.'])->withInput();
            }
        }

        // Check for overlapping bookings
        $overlapping = Booking::where('field_id', $field->id)
            ->where('tanggal', $data['tanggal'])
            ->whereIn('status', ['approved', 'pending'])
            ->where(function ($query) use ($data) {
                $query->where(function ($q) use ($data) {
                    // New booking starts during existing booking
                    $q->where('jam_mulai', '<=', $data['jam_mulai'])
                      ->where('jam_selesai', '>', $data['jam_mulai']);
                })->orWhere(function ($q) use ($data) {
                    // New booking ends during existing booking
                    $q->where('jam_mulai', '<', $data['jam_selesai'])
                      ->where('jam_selesai', '>=', $data['jam_selesai']);
                })->orWhere(function ($q) use ($data) {
                    // New booking contains existing booking
                    $q->where('jam_mulai', '>=', $data['jam_mulai'])
                      ->where('jam_selesai', '<=', $data['jam_selesai']);
                });
            })
            ->exists();

        if ($overlapping) {
            return back()->withErrors(['jam_mulai' => 'Jam yang dipilih sudah dibooking. Silakan pilih jam lain.'])->withInput();
        }

        // Hitung durasi dalam jam
        $start = strtotime($data['jam_mulai']);
        $end = strtotime($data['jam_selesai']);
        $hours = ($end - $start) / 3600;
        $total = $hours * $field->harga_per_jam;

        $buktiPath = null;
        if ($request->hasFile('bukti_transfer')) {
            $buktiPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'field_id' => $field->id,
            'tanggal' => $data['tanggal'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'total_harga' => $total,
            'bukti_transfer' => $buktiPath,
            'catatan' => $data['catatan'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.booking.mine')->with('message', 'Booking berhasil dibuat, menunggu konfirmasi.');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('field.gor')
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        return view('booking.mine', compact('bookings'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) abort(403);
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Booking tidak bisa dibatalkan.');
        }
        $booking->update(['status' => 'cancelled']);
        return back()->with('message', 'Booking dibatalkan.');
    }
}
