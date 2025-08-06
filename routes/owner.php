<?php

use App\Http\Controllers\Web\Backend\Bookings\AdminBookingsController;
use App\Http\Controllers\Web\Frontend\DashboardFrontendController;
use App\Http\Controllers\Web\Frontend\Owner\OwnerSearchController;
use App\Http\Controllers\Web\Frontend\Owner\VillaController;
use App\Http\Controllers\Web\Frontend\RequestWithdrawController;
use App\Http\Controllers\Web\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;





//! Route for Dashboard
Route::controller(DashboardFrontendController::class)->group(function () {
    Route::get('/dashboard', 'ownerDashboard')->name('owner.dashboard');
    Route::get('/booking', 'ownerBooking')->name('owner.booking');
    Route::get('/payment', 'ownerPayments')->name('owner.payment');
    Route::get('/payment/option', 'ownerPaymentOption')->name('owner.payment.option');
    Route::get('/profile', 'ownerProfile')->name('owner.profile');
    Route::post('/owner/bookings/status/{id}', 'changeStatus')->name('change.bookings.status');
    Route::get('/booking/view/{id}', 'ownerBookingView')->name('owner.booking.view');

});

//! Route for Owner Dashboard search
Route::controller(OwnerSearchController::class)->group(function () {
    Route::get('/search/owner/villa', 'ownerSearchVilla')->name('owner.search.villa');
    Route::get('/owner/search-villas', 'search')->name('villas.search');
    Route::get('/search/status/villas', 'searchStatus')->name('villas.search.status');
});


Route::get('/my-listing', [VillaController::class, 'ownerMyListing'])->name('owner.my-listing');
Route::get('/add-villa',  [VillaController::class, 'ownerAddVilla'])->name('owner.add-villa');
Route::post('/add-villa/store', [VillaController::class, 'ownerVillaStore'])->name('owner.villa.store');
Route::get('/edit-villa/{id}', [VillaController::class, 'ownerEditVilla'])->name('owner.edit-villa');
Route::patch('/update-villa/{id}', [VillaController::class, 'ownerVillaUpdate'])->name('owner.update.villa');
Route::delete('/villa-image/delete/{id}', [VillaController::class, 'deleteVillaImage'])->name('villa.image.delete');
Route::delete('/delete-villa/{id}', [VillaController::class, 'ownerDeleteVilla'])->name('owner.delete.villa');



//    User Profile Update
Route::patch('/dashboard/profile/update/{id}', [UserProfileController::class, 'ownerUpdateProfile'])->name('owner.update.profile');
Route::put('/dashboard/profile/update/password', [UserProfileController::class, 'ownerUpdatePassword'])->name('owner.update.profile.password');
Route::post('/dashboard/profile/update/photo', [UserProfileController::class, 'ownerUpdateProfilePhoto'])->name('owner.update.profile.photo');
Route::delete('/dashboard/profile/delete/photo', [UserProfileController::class, 'ownerDeleteProfilePhoto'])->name('owner.delete.profile.photo');

//withdrawal request to admin
Route::post('/withdraw/request', [RequestWithdrawController::class, 'requestWithdrawal'])->name('withdraw.request');
