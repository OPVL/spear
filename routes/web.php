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

use App\Spear;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'view'], function () {
        Route::get('group/{group}', 'TargetGroupController@show')->name('view.group.show');

    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', 'TargetGroupController@index')->name('groups.index');
        Route::get('create', 'TargetGroupController@create')->name('groups.create');
        Route::get('{targetGroup}', 'TargetGroupController@show')->name('groups.show');
        Route::post('/', 'TargetGroupController@store')->name('groups.store');
        Route::patch('{targetGroup}', 'TargetGroupController@update')->name('groups.update');
        Route::delete('{targetGroup}', 'TargetGroupController@delete')->name('groups.delete');
    });

    Route::group(['prefix' => 'targets'], function () {
        Route::get('/', 'TargetController@index')->name('targets.index');
        Route::get('create', 'TargetController@create')->name('targets.create');
        Route::get('{target}', 'TargetController@show')->name('targets.show');
        Route::post('/', 'TargetController@store')->name('targets.store');
        Route::patch('{target}', 'TargetController@update')->name('targets.update');
        Route::delete('{target}', 'TargetController@delete')->name('targets.delete');
    });
    Route::group(['prefix' => 'templates'], function () {
        Route::get('/', 'TemplateController@index')->name('templates.index');
        Route::get('create', 'TemplateController@create')->name('templates.create');
        Route::get('{template}', 'TemplateController@show')->name('templates.show');
        Route::post('/', 'TemplateController@store')->name('templates.store');
        Route::patch('{template}', 'TemplateController@update')->name('templates.update');
        Route::delete('{template}', 'TemplateController@delete')->name('templates.delete');
    });
});

Route::get('captcha/{hash}', 'SpearController@captcha')->name('spear.captcha');

Route::get('{group}/{hash}', 'SpearController@gotcha')->name('spear.gotcha');

Route::get('sendgrid', function () {
    $spears = Spear::all();

    foreach ($spears as $spear) {
        $body = view('mails.quarantine', ['spear' => $spear])->render();

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("quarantine@gleeson.onmicorosoft.com", "Microsoft Quarantine");
        $email->setSubject("Spam Quarantine Report");
        $email->addBcc("lloyd.culpepper@evaporate.tech", "Lloyd Culpepper");
        $email->addTo($spear->target->email, $spear->target->first_name." ".$spear->target->last_name);
        // $email->addTo("jpeploe@workwithglee.com", "Jack Peploe");
        // $email->addTo("lloyd.culpepper@evaporate.tech", "Lloyd Culpepper");
        // $email->addTo("Elly.Whitehead@evaporate.tech", "Elly Whitehead");
        // $email->addTo("evaporate@youthfed.org", "EV");
        // $email->addTo("mike.etherington@evaporate.tech", "Mike Etherington");
        // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        // $email->addContent(
        //     "text/html",
        //     "<strong>and easy to do anywhere, even with PHP</strong>"
        // );
        $email->addContent('text/html', $body);
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
        // break;
    }
});
