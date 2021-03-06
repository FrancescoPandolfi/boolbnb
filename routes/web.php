<?php

use Illuminate\Support\Facades\Route;



Route::namespace('Host')->middleware('auth')->group(function () {

    //Sponsorship
    Route::get('/host/sponsorships', 'SponsorshipController@index')->name('sponsorships.index');
    Route::get('/payment/done/{price}/{apartmentId}', 'SponsorshipController@store')->name('payment.done');
    Route::get('/test', 'SponsorshipController@test')->name('sponsor.test');

    // Apartments
    Route::resource('host', 'ApartmentController');

});



// Checkout
Route::post('/checkout', 'PaymentsController@make')->name('checkout');



// Auth
Auth::routes();

// Message
Route::get('/messages', 'MessageController@index')->name('messages.index');

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Apartments
Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/{id}', 'ApartmentController@show')->name('home.show');

// Search apartments
Route::post('/apartment/search', 'SearchApartmentController@index')->name('apartment.search');

// Filter apartments
Route::get('/apartment/search', 'SearchApartmentController@filter')->name('apartment.filter');

//Payments
Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');
Route::get('/payment/process/{price}', 'PaymentsController@process')->name('payment.process');
