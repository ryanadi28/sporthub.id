<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Field;

class FixBookingFieldIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek booking yang field_id-nya tidak valid (tidak ada di tabel fields)
        $invalidBookings = Booking::whereNotIn('field_id', Field::pluck('id'))->get();
        if ($invalidBookings->count() > 0) {
            echo "Ada booking dengan field_id tidak valid:\n";
            foreach ($invalidBookings as $booking) {
                echo "ID: {$booking->id}, field_id: {$booking->field_id}\n";
            }
        } else {
            echo "Semua booking sudah punya field_id yang valid.\n";
        }
    }
}
