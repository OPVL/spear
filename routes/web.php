<?php

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

use App\Mail\PhishingEmail;
use App\Spear;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/{hash}', 'SpearController@gotcha')->name('test.gotcha');

Route::get('{group}/{hash}/confirm', 'SpearController@gotcha')->name('spear.gotcha');

Route::get('/send-mail', function () {

    $spear = Spear::find(42);
    Mail::to($spear->target)->send(new PhishingEmail($spear));

    return 'A message has been sent to Mailtrap!';

});
