<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Field;

class PrintAllBookingPerFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = Field::all();
        foreach ($fields as $field) {
            echo "Lapangan: {$field->id} - {$field->nama}\n";
            $bookings = Booking::where('field_id', $field->id)->orderBy('tanggal')->orderBy('jam_mulai')->get();
            if ($bookings->count() === 0) {
                echo "  (tidak ada booking)\n";
            } else {
                foreach ($bookings as $b) {
                    echo "  Tanggal: {$b->tanggal}, {$b->jam_mulai}-{$b->jam_selesai}, Status: {$b->status}\n";
                }
            }
        }
    }
}
