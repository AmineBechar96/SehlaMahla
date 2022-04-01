<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::post('add','App\Http\Controllers\HomeController@store');

Route::resource('home','App\Http\Controllers\HomeController');
Route::get('{type}/agency-details/{id}','App\Http\Controllers\Client\AgencyDetailsController@index');
Route::get('/general-rules',function(){
    return view('client.service-rules');
});
//Route::resource('categories','App\Http\Controllers\Client\CategoryController');

/*Route::get('estimation','App\Http\Controllers\EstimationController@index')->name('estimation');
Route::resource('compare','App\Http\Controllers\CompareController');
Route::resource('check','App\Http\Controllers\StateController');
Route::resource('budget','App\Http\Controllers\BudgetController');
Route::resource('best','App\Http\Controllers\Stati1Controller')->middleware(['auth','verified']);
Route::resource('features','App\Http\Controllers\Stati2Controller')->middleware(['auth','verified']);
Route::resource('market','App\Http\Controllers\Stati3Controller')->middleware(['auth','verified']);
Route::resource('additional-features','App\Http\Controllers\addiFeatController');

Route::resource('advanced','App\Http\Controllers\AdvancedController');
Route::resource('news','App\Http\Controllers\newsContoller');
//Route::get('{type}/agency-details/{id}','App\Http\Controllers\AgencyDetailsController@index')->middleware(['auth','verified']);*/


Route::prefix('client')->middleware(['auth','verified','auth.isClient','auth.isActive'])->group(function(){
Route::resource('/dashboard','App\Http\Controllers\Client\ClientDashboardController');
Route::resource('/all','App\Http\Controllers\AllServices');
Route::resource('/liked-services','App\Http\Controllers\Client\likedServicesContoller');
Route::resource('/my-services','App\Http\Controllers\Client\savedServicesContoller');
Route::resource('weekly-markets','App\Http\Controllers\weeklyMarketContoller');
Route::resource('general-mechanic','App\Http\Controllers\generalMechanicContoller');
Route::resource('detached-pieces-stores','App\Http\Controllers\detachedPiecesContoller');
Route::resource('sell-points','App\Http\Controllers\sellpointsContoller');
Route::resource('transport-operators','App\Http\Controllers\transportContoller');
Route::resource('recovery-truck','App\Http\Controllers\RecoveryTruckContoller');
Route::resource('rent-agencies','App\Http\Controllers\rentAgenController');
Route::get('{type}/agency-details/{id}','App\Http\Controllers\Client\AgencyDetailsController@index');
Route::resource('add-rating','App\Http\Controllers\Client\RatingController');
Route::resource('/categories','App\Http\Controllers\Client\CategoryController');
Route::resource('{id}/types','App\Http\Controllers\Client\TypeController');
Route::resource('{id}/browze','App\Http\Controllers\Client\BrowzeServicesController');
Route::resource('/book','App\Http\Controllers\Client\BookingController');
Route::resource('/bookings','App\Http\Controllers\Client\BookingList');
Route::resource('{status}/bookings','App\Http\Controllers\Client\BookingStatusController');
Route::get('/markasread','App\Http\Controllers\Client\ClientDashboardController@markAsRead');
Route::resource('{id}/booking','App\Http\Controllers\Client\BookingDetailsController');
Route::get('{id}/notification/{notifi}','App\Http\Controllers\Client\BookingDetailsReadNotiController@index');
Route::get('{id}/coupon/{notifi}','App\Http\Controllers\Client\CouponNotificationController@index');
Route::get('/coupons','App\Http\Controllers\Client\CouponController@index');
Route::get('/client-analytics','App\Http\Controllers\Client\ClientAnalyticsController@index');
Route::get('/recommended','App\Http\Controllers\Client\RecommendedController@index');
Route::get('/settings','App\Http\Controllers\Client\AccountSetting@index');
Route::post('/change-password','App\Http\Controllers\Client\AccountSetting@change_client_password')->name('change-cpassword');
Route::post('/delete-account','App\Http\Controllers\Client\AccountSetting@deleteAccount')->name('delete-client-account');

Route::get('/chat','App\Http\Controllers\Chat\ChatController@index');


});
Route::prefix('provider')->middleware(['auth','verified','auth.isProvider'])->group(function(){
    Route::resource('/dashboard','App\Http\Controllers\Provider\ServiceProviderDashboardController')->middleware('auth.isGoing');
    Route::resource('/categories','App\Http\Controllers\Provider\CategoryController')->middleware('auth.isGoing');
    Route::resource('/{id}/types','App\Http\Controllers\Provider\TypeController')->middleware('auth.isGoing');
    Route::resource('/{id}/create','App\Http\Controllers\Provider\AddServiceController')->middleware('auth.isGoing');
    Route::get('{id}/edit','App\Http\Controllers\Provider\AddServiceController@edit')->middleware('auth.isGoing');  
    Route::post('/delete','App\Http\Controllers\Provider\ServicesListController@delete')->name('service.delete')->middleware('auth.isGoing'); 
    Route::resource('/users-list','App\Http\Controllers\Provider\UserListController')->middleware('auth.isGoing');
    Route::get('/markasread','App\Http\Controllers\Provider\ServiceProviderDashboardController@markAsRead')->middleware('auth.isGoing');
    Route::resource('/services-list','App\Http\Controllers\Provider\ServicesListController')->middleware('auth.isGoing');
    Route::resource('/bookings','App\Http\Controllers\Provider\BookingListController')->middleware('auth.isGoing');
    Route::resource('{status}/bookings','App\Http\Controllers\Provider\BookingStatusProviderController')->middleware('auth.isGoing');
    Route::resource('{id}/booking','App\Http\Controllers\Provider\BookingDetailsController')->middleware('auth.isGoing');
    Route::resource('/products','App\Http\Controllers\Provider\ProductController')->middleware('auth.isGoing');
    Route::get('/checkout/{id}','App\Http\Controllers\Provider\OrderCheckoutController@index')->middleware('auth.isGoing');
    Route::get('/clients','App\Http\Controllers\Provider\ClientController@index')->middleware('auth.isGoing');
    Route::get('/invoices','App\Http\Controllers\Provider\InvoiceController@index')->middleware('auth.isGoing');
    Route::get('/invoices/{id}','App\Http\Controllers\Provider\InvoiceDetailsController@index')->middleware('auth.isGoing');
    Route::get('/invoices/{id}/download','App\Http\Controllers\Provider\InvoiceDetailsController@downloadPDF')->middleware('auth.isGoing');
    Route::get('/invoices/edit/{id}','App\Http\Controllers\Provider\OrderCheckoutController@edit')->middleware('auth.isGoing');
    Route::get('/chat','App\Http\Controllers\Chat\ChatController@index')->middleware('auth.isGoing');
    Route::get('/discounts','App\Http\Controllers\Provider\DiscountController@index')->middleware('auth.isGoing');
    Route::get('/{id}/coupons','App\Http\Controllers\Provider\GeneratedCouponsController@index')->middleware('auth.isGoing');
    Route::get('/provider-analytics','App\Http\Controllers\Provider\ProviderAnalyticsController@index')->middleware('auth.isGoing');
    Route::get('/membership','App\Http\Controllers\Provider\AccountSettingProviderController@index'); 
    Route::post('/delete-account','App\Http\Controllers\Provider\AccountSettingProviderController@deleteAccount')->name('delete-provider-account');
    Route::get('{id}/notification/{notif}','App\Http\Controllers\Provider\BookingDetailsReadNotiController@index')->middleware('auth.isGoing');;
    Route::post('/change-password','App\Http\Controllers\Provider\AccountSettingProviderController@change_provider_password')->name('change-ppassword');

});



Route::get('/', function () {
    return view('index');
});
