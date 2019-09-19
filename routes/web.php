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

Route::get('{group}/{hash}', 'SpearController@gotcha')->name('spear.gotcha');

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
        $to = 'jack.peploe@evaporate.tech';
        $to = 'mike.etherington@evaporate.tech';
        // $to = 'lloyd.culpepper@evaporate.tech';
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

        break;
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

Route::get('sendgrid', function () {
    $spears = Spear::all();

    foreach ($spears as $spear) {
        $body = view('mails.quarantine', ['spear' => $spear])->render();

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("quarantine@youthfed.onmicorosoft.com", "Microsoft Quarantine");
        $email->setSubject("Spam Quarantine Report");
        // $email->addTo("jack.peploe@evaporate.tech", "Jack Peploe");
        // $email->addTo("lloyd.culpepper@evaporate.tech", "Lloyd Culpepper");
        // $email->addTo("Elly.Whitehead@evaporate.tech", "Elly Whitehead");
        $email->addTo("evaporate@youthfed.org", "EV");
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
        break;
    }
});

Route::get('sample', function () {
    // require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
});
