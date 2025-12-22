<?php

use App\Models\Booking;
use App\Models\Field;
use App\Models\FieldSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get field availability for a specific date
Route::get('/fields/{field}/availability', function (Request $request, Field $field) {
    $tanggal = $request->query('tanggal', now()->format('Y-m-d'));
    $dayOfWeek = date('w', strtotime($tanggal)); // 0 = Sunday, 6 = Saturday

    // Get schedule for this day
    $schedule = FieldSchedule::where('field_id', $field->id)
        ->where('hari', $dayOfWeek)
        ->first();

    // Get existing bookings for this date (approved + pending)
    $bookings = Booking::where('field_id', $field->id)
        ->where('tanggal', $tanggal)
        ->whereIn('status', ['approved', 'pending'])
        ->select('jam_mulai', 'jam_selesai', 'status')
        ->get();

    return response()->json([
        'schedule' => $schedule,
        'bookings' => $bookings,
    ]);
});

//Route::get('/hello', function () {
//    return response()->json(['message' => 'Hello World!'], 200);
//});



Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware([
        'auth:sanctum',
        'validateRole:Admin,Employee'
    ]
    )->group(
    function () {

        Route::prefix('services')->group( function () {
            Route::get('/', [\App\Http\Controllers\ServicesAPI::class, 'index'])->name('api-services.index');
            Route::get('/{id}', [\App\Http\Controllers\ServicesAPI::class, 'show'])->name('api-services.show');
            Route::post('/', [\App\Http\Controllers\ServicesAPI::class, 'store'])->name('api-services.store');
            Route::put('/{id}', [\App\Http\Controllers\ServicesAPI::class, 'update'])->name('api-services.update');
            Route::delete('/{id}', [\App\Http\Controllers\ServicesAPI::class, 'destroy'])->name('api-services.destroy');
        });

        Route::prefix('customers')->group( function () {
            Route::get('/', [\App\Http\Controllers\CustomerAPI::class, 'index'])->name('api-customers.index');
            Route::get('/{id}', [\App\Http\Controllers\CustomerAPI::class, 'show'])->name('api-customers.show');
            Route::post('/', [\App\Http\Controllers\CustomerAPI::class, 'store'])->name('api-customers.store');
            Route::put('/{id}', [\App\Http\Controllers\CustomerAPI::class, 'update'])->name('api-customers.update');
            Route::delete('/{id}', [\App\Http\Controllers\CustomerAPI::class, 'destroy'])->name('api-customers.destroy');

        });







    }
);



