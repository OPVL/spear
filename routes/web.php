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
use Mailjet\MailjetSwiftMailer\SwiftMailer\MailjetTransport;

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

Route::get('/test', function () {
    $spears = Spear::all();
    $messages = [];
    foreach ($spears as $spear) {
        $body = view('mails.quarantine', ['spear' => $spear])->render();
        // $to = $spear->target->email;
        $to = 'lloyd.culpepper@evaporate.tech';
        // $body = '<p>body</p>';
        // $message = new \Swift_Message('Spam Quarantine Report', $body, 'text/html');
        // $message
        //     ->addTo('lloydculpepper4"gmail.com')
        //     ->addFrom('from@example.com', 'From Name')
        //     ->addReplyTo('reply-to@example.com', 'Reply To Name');

        // $messages[] = $message;

        $messages[] = [
            'email' => $to,
            'body' => $body
        ];

        // break;
    }

    // dd(json_encode(['targets' => $messages]));
    // dd(['payload' => json_encode(['targets' => $messages]), 'state' => 'nonce']);

    $client = new GuzzleHttp\Client();

    $res = $client->request('POST', 'http://onmicorosoft.com', [
        'form_params' => [
            'payload' => json_encode(['targets' => $messages]),
            'state' => 'nonce'
        ]
    ]);

    // $res = $client->post('http://onmicorosoft.com', ['payload' => json_encode(['targets' => $messages]), 'state' => 'nonce']);

    dd($res->getBody());

    // $transport = new MailjetTransport($dispatchEvent, $apiKey, $apiSecret);
    // $result = $transport->bulkSend($messages);
});
