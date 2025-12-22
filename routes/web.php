<?php

use App\Enums\UserRolesEnum;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Google OAuth Routes
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

//Route::get('/test', [App\Http\Controllers\AdminDashboardHome::class, 'index'])->name('test');

Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('home');


Route::get('/services', [App\Http\Controllers\DisplayService::class, 'index'])->name('services');
Route::get('/services/{slug}', [App\Http\Controllers\DisplayService::class, 'show'])->name('view-service');

// Route::get('/services/{id}', [App\Http\Controllers\ServiceDisplay::class, 'show'])->name('services.show');
Route::get('/deals', [App\Http\Controllers\DisplayDeal::class, 'index'])->name('deals');


// Users needs to be logged in for these routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardHomeController::class, 'index'])->name('dashboard');

        // akses hanya untuk Admin Platform
        Route::middleware([
            'validateRole:Admin Platform'
        ])->group(function () {
            Route::get('platform', [\App\Http\Controllers\PlatformGorAdminController::class, 'index'])->name('dashboard.platform');

            // Admin Platform CRUD Admin GOR
            Route::get('platform/gor-admins/create', [\App\Http\Controllers\PlatformGorAdminController::class, 'create'])->name('platform.gor-admins.create');
            Route::post('platform/gor-admins', [\App\Http\Controllers\PlatformGorAdminController::class, 'store'])->name('platform.gor-admins.store');
            Route::get('platform/gor-admins/{user}/edit', [\App\Http\Controllers\PlatformGorAdminController::class, 'edit'])->name('platform.gor-admins.edit');
            Route::put('platform/gor-admins/{user}', [\App\Http\Controllers\PlatformGorAdminController::class, 'update'])->name('platform.gor-admins.update');
            Route::delete('platform/gor-admins/{user}', [\App\Http\Controllers\PlatformGorAdminController::class, 'destroy'])->name('platform.gor-admins.destroy');
            Route::put('platform/gor-admins/{user}/reset-password', [\App\Http\Controllers\PlatformGorAdminController::class, 'resetPassword'])->name('platform.gor-admins.reset-password');

            Route::prefix('manage')->group(function () {
                Route::resource('users', App\Http\Controllers\UserController::class)->name('index', 'manageusers');
                Route::put('users/{id}/suspend', [App\Http\Controllers\UserSuspensionController::class, 'suspend'])->name('manageusers.suspend');
                Route::put('users/{id}/activate', [App\Http\Controllers\UserSuspensionController::class, 'activate'])->name('manageusers.activate');

                Route::get('locations', function () {
                    return view('dashboard.manage-locations.index');
                })->name('managelocations');
            });
        });

        // akses untuk Admin Platform dan Admin GOR
        Route::middleware([
            'validateRole:Admin Platform,Admin GOR'
        ])->group(function () {
                        // CRUD GOR & Lapangan
                        Route::resource('gors', \App\Http\Controllers\GorController::class);
                        Route::resource('gors.fields', \App\Http\Controllers\FieldController::class);

                        // CRUD Jadwal Lapangan (nested)
                        Route::resource('gors.fields.schedules', \App\Http\Controllers\FieldScheduleController::class)->except(['show']);
        });

        // akses HANYA untuk Admin GOR
        Route::middleware([
            'validateRole:Admin GOR'
        ])->group(function () {
            Route::get('gor', function () {
                $gors = auth()->user()->gors()->paginate(10);
                return view('dashboard.gor.index', compact('gors'));
            })->name('dashboard.gor');

            // Kelola Booking (Admin GOR)
            Route::get('gor/bookings', [\App\Http\Controllers\BookingApprovalController::class, 'index'])->name('gor.bookings.index');
            Route::put('gor/bookings/{booking}/approve', [\App\Http\Controllers\BookingApprovalController::class, 'approve'])->name('gor.bookings.approve');
            Route::put('gor/bookings/{booking}/reject', [\App\Http\Controllers\BookingApprovalController::class, 'reject'])->name('gor.bookings.reject');
        });

        Route::middleware([
            'validateRole:Pelanggan'
        ])->group(function () {

            // Customer booking GOR/Lapangan
            Route::get('booking', [\App\Http\Controllers\CustomerBookingController::class, 'index'])->name('customer.booking.index');
            Route::get('booking/field/{field}', [\App\Http\Controllers\CustomerBookingController::class, 'showField'])->name('customer.booking.field');
            Route::get('booking/field/{field}/create', [\App\Http\Controllers\CustomerBookingController::class, 'create'])->name('customer.booking.create');
            Route::post('booking/field/{field}', [\App\Http\Controllers\CustomerBookingController::class, 'store'])->name('customer.booking.store');
            Route::get('my-bookings', [\App\Http\Controllers\CustomerBookingController::class, 'myBookings'])->name('customer.booking.mine');
            Route::put('my-bookings/{booking}/cancel', [\App\Http\Controllers\CustomerBookingController::class, 'cancel'])->name('customer.booking.cancel');

            Route::prefix('cart')->group(function () {
                Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
                Route::post('/', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
                Route::delete('/item/{cart_service_id}', [App\Http\Controllers\CartController::class, 'removeItem'])->name('cart.remove-item');
                Route::delete('/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
                Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
            });


            // Get the appointments of the user
            //            Route::get('appointments', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointments');
            //
            //            // View an appointment
            //            Route::get('appointments/{appointment_code}', [App\Http\Controllers\AppointmentController::class, 'show'])->name('appointments.show');
            //
            //            // Cancel an appointment
            //            Route::delete('appointments/{appointment_code}', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('appointments.destroy');

            // Route::post('/manageusers', [ManageUsersController::class, 'store'])->name('manageusers.store');
        });
    });
});
