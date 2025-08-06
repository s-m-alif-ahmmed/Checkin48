<?php

use App\Http\Controllers\Web\Backend\BenefitOfJoining\BenefitsofJoiningController;
use App\Http\Controllers\Web\Backend\Blogs\BlogController;
use App\Http\Controllers\Web\Backend\Bookings\AdminBookingsController;
use App\Http\Controllers\Web\Backend\Cms\CmsController;
use App\Http\Controllers\Web\Backend\CountryManagement\CityController;
use App\Http\Controllers\Web\Backend\CountryManagement\CountryController;
use App\Http\Controllers\Web\Backend\CountryManagement\StateController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\ExpertTeamMember\ExpertTeamController;
use App\Http\Controllers\Web\Backend\Faq\FaqController;
use App\Http\Controllers\Web\Backend\Newslater\AdminNewsLetterController;
use App\Http\Controllers\Web\Backend\OurClients\OurClientsController;
use App\Http\Controllers\Web\Backend\OurMission\OurMissionController;
use App\Http\Controllers\Web\Backend\PriceType\PriceTypeController;
use App\Http\Controllers\Web\Backend\Review\AdminReviewController;
use App\Http\Controllers\Web\Backend\Settings\SocialMediaController;
use App\Http\Controllers\Web\Backend\Tags\TagsController;
use App\Http\Controllers\Web\Backend\Topbar\TopbarController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\Villa\AdminVillaController;
use App\Http\Controllers\Web\Backend\Villa\AmenityController;
use App\Http\Controllers\Web\Backend\Villa\OwnerStatementController;
use App\Http\Controllers\Web\Backend\Villa\PropertyLabelController;
use App\Http\Controllers\Web\Backend\Villa\TaxController;
use App\Http\Controllers\Web\Backend\Villa\UserStatementController;
use App\Http\Controllers\Web\Backend\WhyChooseUS\WhychooseUsController;
use App\Http\Controllers\Web\Backend\WhyChooseVilla\WhyChooseVillaController;
use App\Http\Controllers\Web\Backend\Withdraw\AdmintWithdrawController;
use Illuminate\Support\Facades\Route;




//! Route for Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//! Route for Users Page
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/admin/login-as-user/{id}', 'loginAsUser')->name('admin.login-as-user');
    Route::get('/user/status/{id}', 'status')->name('user.status');
    Route::delete('/user/destroy/{id}', 'destroy')->name('user.destroy');
});

//! Route for FAQ
Route::controller(FaqController::class)->group(function () {
    Route::get('/faq', 'index')->name('faq.index');
    Route::get('/faq/create', 'create')->name('faq.create');
    Route::post('/faq/store', 'store')->name('faq.store');
    Route::get('/faq/edit/{id}', 'edit')->name('faq.edit');
    Route::patch('/faq/update/{id}', 'update')->name('faq.update');
    Route::get('/faq/status/{id}', 'status')->name('faq.status');
    Route::delete('/faq/destroy/{id}', 'destroy')->name('faq.destroy');
});

//! Route for FAQ
Route::controller(CountryController::class)->group(function () {
    Route::get('/country-management/country', 'index')->name('country.index');
    Route::get('/country-management/country/create', 'create')->name('country.create');
    Route::post('/country-management/country/store', 'store')->name('country.store');
    Route::get('/country-management/country/edit/{id}', 'edit')->name('country.edit');
    Route::patch('/country-management/country/update/{id}', 'update')->name('country.update');
    Route::get('/country-management/country/status/{id}', 'status')->name('country.status');
    Route::delete('/country-management/country/destroy/{id}', 'destroy')->name('country.destroy');
});

//! Route for FAQ
Route::controller(CityController::class)->group(function () {
    Route::get('/country-management/city', 'index')->name('city.index');
    Route::get('/country-management/city/create', 'create')->name('city.create');
    Route::post('/country-management/city/store', 'store')->name('city.store');
    Route::get('/country-management/city/edit/{id}', 'edit')->name('city.edit');
    Route::patch('/country-management/city/update/{id}', 'update')->name('city.update');
    Route::get('/country-management/city/status/{id}', 'status')->name('city.status');
    Route::delete('/country-management/city/destroy/{id}', 'destroy')->name('city.destroy');
});

//! Route for FAQ
Route::controller(StateController::class)->group(function () {
    Route::get('/country-management/state', 'index')->name('state.index');
    Route::get('/country-management/state/create', 'create')->name('state.create');
    Route::post('/country-management/state/store', 'store')->name('state.store');
    Route::get('/country-management/state/edit/{id}', 'edit')->name('state.edit');
    Route::patch('/country-management/state/update/{id}', 'update')->name('state.update');
    Route::get('/country-management/state/status/{id}', 'status')->name('state.status');
    Route::delete('/country-management/state/destroy/{id}', 'destroy')->name('state.destroy');
});

// Social Media Module
Route::controller(SocialMediaController::class)->group(function () {
    Route::get('/social-media', 'index')->name('social.media');
    Route::get('/social-media/create', 'create')->name('social-media.create');
    Route::post('/social-media/store', 'store')->name('social.media.store');
    Route::put('/social-media/{id}', 'update')->name('social.media.update');
    Route::delete('/social-media/{id}', 'destroy')->name('social.media.destroy');
});


// why choose us
Route::controller(WhychooseUsController::class)->group(function () {
    Route::get('/why-choose-us', 'index')->name('why-choose-us.index');
    Route::get('/why-choose-us/create', 'create')->name('why-choose-us.create');
    Route::post('/why-choose-us/store', 'store')->name('why-choose-us.store');
    Route::get('/why-choose-us/status/{id}', 'status')->name('why-choose-us.status');
    //update route
    Route::get('/why-choose-us/edit/{slug}', 'edit')->name('why-choose-us.edit');
    Route::put('/why-choose-us/update/{slug}', 'update')->name('why-choose-us.update');
    //del route
    Route::delete('/why-choose-us/{id}', 'destroy')->name('why-choose-us.destroy');
});


// why choose our villa
Route::controller(WhyChooseVillaController::class)->group(function () {
    Route::get('/why-choose-villa', 'index')->name('why-choose-villa.index');
    Route::get('/why-choose-villa/create', 'create')->name('why-choose-villa.create');
    Route::post('/why-choose-villa/store', 'store')->name('why-choose-villa.store');
    Route::get('/why-choose-villa/status/{id}', 'status')->name('why-choose-villa.status');
    //update route
    Route::get('/why-choose-villa/edit/{id}', 'edit')->name('why-choose-villa.edit');
    Route::put('/why-choose-villa/update/{id}', 'update')->name('why-choose-villa.update');
    //del route
    Route::delete('/why-choose-villa/{id}', 'destroy')->name('why-choose-villa.destroy');
});


//! Route for CMS
Route::controller(CmsController::class)->group(function () {
    //Footer Button
    Route::get('/cms/footer-button', 'footerButton')->name('cms.footer.button');
    Route::put('/cms/footer-button/update', 'footerButtonUpdate')->name('cms.footer.button.update');

    //home page banner
    Route::get('/cms/home/header', 'homeBanner')->name('cms.home.header');
    Route::put('/cms/home/header/update', 'homeBannerUpdate')->name('cms.home.header.update');

    //about us page banner
    Route::get('/cms/aboutus/header', 'aboutusBanner')->name('cms.aboutus.header');
    Route::put('/cms/aboutus/header/update', 'aboutusBannerUpdate')->name('cms.aboutus.header.update');

    // villa header banner
    Route::get('/cms/villa/header', 'villaBanner')->name('cms.villa.header');
    Route::put('/cms/villa/header/update', 'villaBannerUpdate')->name('cms.villa.header.update');

    // villa header banner
    Route::get('/cms/all/villa/header', 'allVillaBanner')->name('cms.all.villa.header');
    Route::put('/cms/all/villa/header/update', 'allVillaBannerUpdate')->name('cms.all.villa.update');

    // villa Detail header banner
    Route::get('/cms/villa-detail/header', 'villaDetailBanner')->name('cms.villa-detail.header');
    Route::put('/cms/villa-detail/header/update', 'villaDetailBannerUpdate')->name('cms.villa-detail.header.update');

    //Loyalty banner
    Route::get('/cms/loyalty', 'loyaltyBanner')->name('cms.loyalty.header');
    Route::put('/cms/loyalty/update', 'loyaltyBannerUpdate')->name('cms.loyalty.update');

    // blog banner
    Route::get('/cms/blog', 'blogBanner')->name('cms.blog.header');
    Route::put('/cms/blog/update', 'blogBannerUpdate')->name('cms.blog.update');

    // blog Detail banner
    Route::get('/cms/blog-detail', 'blogDetailBanner')->name('cms.blog-detail.header');
    Route::put('/cms/blog-detail/update', 'blogDetailBannerUpdate')->name('cms.blog-detail.update');

    //Contact us banner
    Route::get('/cms/contact/banner', 'contactBanner')->name('cms.contact.header');
    Route::put('/cms/contact/banner/update', 'contactBannerUpdate')->name('cms.contact.update');

    //checkout banner
    Route::get('/cms/checkout/banner', 'checkoutBanner')->name('cms.checkout.header');
    Route::put('/cms/checkout/banner/update', 'checkoutBannerUpdate')->name('cms.checkout.update');

    //search banner
    Route::get('/cms/search/banner', 'searchBanner')->name('cms.search.header');
    Route::put('/cms/search/banner/update', 'searchBannerUpdate')->name('cms.search.update');
});


//! Route for Our Mission
Route::controller(OurMissionController::class)->group(function () {
    Route::get('/our-mission', 'index')->name('our-mission.index');
    Route::put('/our-mission/update/{id}', 'update')->name('our-mission.update');
});

//! Route for Our Clients
Route::controller(OurClientsController::class)->group(function () {
    Route::get('/our-clients', 'index')->name('our-clients.index');
    //create route
    Route::get('/our-clients/create', 'create')->name('our-clients.create');
    Route::post('/our-clients/store', 'store')->name('our-clients.store');
    //status route
    Route::get('/our-clients/status/{id}', 'status')->name('our-clients.status');
    //update route
    Route::get('/our-clients/edit/{id}', 'edit')->name('our-clients.edit');
    Route::put('/our-clients/update/{id}', 'update')->name('our-clients.update');
    //del route
    Route::delete('/our-clients/{id}', 'destroy')->name('our-clients.destroy');
});


//! Route for Our Expert
Route::controller(ExpertTeamController::class)->group(function () {
    Route::get('/expert-team', 'index')->name('expert-team.index');
    //create route
    Route::get('/expert-team/create', 'create')->name('expert-team.create');
    Route::post('/expert-team/store', 'store')->name('expert-team.store');
    //status route
    Route::get('/expert-team/status/{id}', 'status')->name('expert-team.status');
    //update route
    Route::get('/expert-team/edit/{id}', 'edit')->name('expert-team.edit');
    Route::put('/expert-team/update/{id}', 'update')->name('expert-team.update');
    //del route
    Route::delete('/expert-team/{id}', 'destroy')->name('expert-team.destroy');
});



//! Route for Our Mission
Route::controller(BenefitsofJoiningController::class)->group(function () {
    Route::get('/benefits-of-joining', 'index')->name('benefits-of-joining.index');
    Route::put('/benefits-of-joining/update/{id}', 'update')->name('benefits-of-joining.update');
});

//! Route for top-bar
Route::controller(TopbarController::class)->group(function () {
    Route::get('/top-bar', 'index')->name('top-bar.index');
    Route::put('/top-bar/update/{id}', 'update')->name('top-bar.update');
});

//Route for TagController
Route::controller(TagsController::class)->group(function () {
    Route::get('/blogs/tags', 'index')->name('tag.index');
    Route::get('/blogs/tags/create', 'create')->name('tag.create');
    Route::post('/blogs/tags/store', 'store')->name('tag.store');
    Route::get('/blogs/tags/edit/{id}', 'edit')->name('tag.edit');
    Route::put('/blogs/tags/update/{id}', 'update')->name('tag.update');
    Route::get('/blogs/tags/status/{id}', 'status')->name('tag.status');
    Route::delete('/blogs/tags/destroy/{id}', 'destroy')->name('tag.destroy');
});


//Route for BlogController
Route::controller(BlogController::class)->group(function () {
    Route::get('/blogs/blog', 'index')->name('blog.index');
    Route::get('/blogs/blog/create', 'create')->name('blog.create');
    Route::post('/blogs/blog/store', 'store')->name('blog.store');
    Route::get('/blogs/blog/edit/{id}', 'edit')->name('blog.edit');
    Route::get('/blogs/blog/show/{slug}', 'show')->name('blog.show');
    Route::put('/blogs/blog/update/{id}', 'update')->name('blog.update');
    Route::get('/blogs/blog/status/{id}', 'status')->name('blog.status');
    Route::delete('/blogs/blog/destroy/{id}', 'destroy')->name('blog.destroy');
});




//Route for Admin side Newsletter
Route::controller(AdminNewsLetterController::class)->group(function () {
    Route::get( 'news/letter', 'index' )->name( 'news.letter.index' );
    Route::get( 'news/letter/create', 'create' )->name( 'news.letter.create' );
    Route::post( 'news/letter/store', 'store' )->name( 'news.letter.store' );
    Route::get( 'news/letter/edit/{id}', 'edit' )->name( 'news.letter.edit' );
    Route::post( 'news/letter/update/{id}', 'update' )->name( 'news.letter.update' );
    Route::delete( 'news/letter/{id}', 'destroy' )->name( 'news.letter.destroy' );
    Route::get( 'news/letter/status/{id}', 'status' )->name( 'news.letter.status' );
});

//route for property level
Route::controller(PropertyLabelController::class)->group(function () {
    Route::get( 'property/levels', 'index' )->name( 'property.levels.index' );
    Route::get( 'property/levels/create', 'create' )->name( 'property.levels.create' );
    Route::post( 'property/levels/store', 'store' )->name( 'property.levels.store' );
    Route::get( 'property/levels/edit/{id}', 'edit' )->name( 'property.levels.edit' );
    Route::post( 'property/levels/update/{id}', 'update' )->name( 'property.levels.update' );
    Route::delete( 'property/levels/{id}', 'destroy' )->name( 'property.levels.destroy' );
    Route::get( 'property/levels/status/{id}', 'status' )->name( 'property.levels.status' );
});

//route for villa owner statements
Route::controller(OwnerStatementController::class)->group(function () {
    Route::get( 'owner/statement', 'index' )->name( 'owner.statement.index' );
    Route::get( 'owner/statement/create', 'create' )->name( 'owner.statement.create' );
    Route::post( 'owner/statement/store', 'store' )->name( 'owner.statement.store' );
    Route::get( 'owner/statement/edit/{id}', 'edit' )->name( 'owner.statement.edit' );
    Route::patch( 'owner/statement/update/{id}', 'update' )->name( 'owner.statement.update');
    Route::delete( 'owner/statement/{id}', 'destroy' )->name( 'owner.statement.destroy' );
    Route::get( 'owner/statement/status/{id}', 'status' )->name( 'owner.statement.status' );
});

//route for villa user statements
Route::controller(UserStatementController::class)->group(function () {
    Route::get( 'user/statement', 'index' )->name( 'user.statement.index' );
    Route::get( 'user/statement/create', 'create' )->name( 'user.statement.create' );
    Route::post( 'user/statement/store', 'store' )->name( 'user.statement.store' );
    Route::get( 'user/statement/edit/{id}', 'edit' )->name( 'user.statement.edit' );
    Route::patch( 'user/statement/update/{id}', 'update' )->name( 'user.statement.update');
    Route::delete( 'user/statement/{id}', 'destroy' )->name( 'user.statement.destroy' );
    Route::get( 'user/statement/status/{id}', 'status' )->name( 'user.statement.status' );
});


//route for amenities
Route::controller(AmenityController::class)->group(function () {
    Route::get( 'amenities', 'index' )->name( 'amenities.index' );
    Route::get( 'amenities/create', 'create' )->name( 'amenities.create' );
    Route::post( 'amenities/store', 'store' )->name( 'amenities.store' );
    Route::get( 'amenities/edit/{id}', 'edit' )->name( 'amenities.edit' );
    Route::post( 'amenities/update/{id}', 'update' )->name( 'amenities.update' );
    Route::delete( 'amenities/del/{id}', 'destroy' )->name( 'amenities.destroy' );
    Route::get( 'amenities/status/{id}', 'status' )->name( 'amenities.status' );
});


//route for tax
Route::controller(TaxController::class)->group(function () {
    Route::get( 'taxes', 'index' )->name( 'taxes.index' );
    Route::get( 'taxes/create', 'create' )->name( 'taxes.create' );
    Route::post( 'taxes/store', 'store' )->name( 'taxes.store' );
    Route::get( 'taxes/edit/{id}', 'edit' )->name( 'taxes.edit' );
    Route::post( 'taxes/update/{id}', 'update' )->name( 'taxes.update' );
    Route::delete( 'taxes/del/{id}', 'destroy' )->name( 'taxes.destroy' );
    Route::get( 'taxes/status/{id}', 'status' )->name( 'taxes.status' );
});


//route for villa
Route::controller(AdminVillaController::class)->group(function () {
    Route::get( 'villas', 'index' )->name( 'villas.index' );
    Route::get( 'villas/{id}', 'show' )->name( 'villas.detail' );
    Route::post( 'villas/villa/status/{id}', 'changeStatus' )->name( 'all.villas.status' );
    Route::delete( 'villas/villa/destroy/{id}', 'destroy' )->name( 'all.villas.destroy' );
});

//route for Review retrive
Route::controller(AdminReviewController::class)->group(function () {
    Route::get( 'reviews', 'index' )->name( 'reviews.index' );
    Route::get( 'reviews/status/{id}', 'status' )->name( 'reviews.status' );
    Route::delete( 'reviews/destroy/{id}', 'destroy' )->name( 'all.reviews.destroy' );
});

//route for booking
Route::controller(AdminBookingsController::class)->group(function () {
    Route::get( 'bookings', 'index' )->name( 'bookings.index' );
    Route::get('bookings/show/{id}', 'show')->name('bookings.show');
    Route::post( 'bookings/status/{id}', 'changeStatus' )->name( 'all.bookings.status' );
    Route::delete( 'bookings/destroy/{id}', 'destroy' )->name( 'all.bookings.destroy' );
});

//route for withdraw
Route::controller(AdmintWithdrawController::class)->group(function () {
    Route::get( 'accept/withdraw', 'index' )->name( 'withdraw.index' );
    Route::post( 'accept/withdraw/status/{id}', 'changeStatus' )->name( 'all.withdraw.status' );
    Route::delete( 'accept/withdraw/destroy/{id}', 'destroy' )->name( 'all.withdraw.destroy' );
});

//route for villa price type
Route::controller(PriceTypeController::class)->group(function () {
    Route::get( 'price/types', 'index' )->name( 'price.types.index' );
    Route::get( 'price/types/create', 'create' )->name( 'price.types.create' );
    Route::post( 'price/types/store', 'store' )->name( 'price.types.store' );
    Route::get( 'price/types/edit/{id}', 'edit' )->name( 'price.types.edit' );
    Route::post( 'price/types/update/{id}', 'update' )->name( 'price.types.update' );
    Route::post( 'price/types/status/{id}', 'status' )->name( 'price.types.status' );
    Route::delete( 'price/types/destroy/{id}', 'destroy' )->name( 'price.types.destroy' );
});






