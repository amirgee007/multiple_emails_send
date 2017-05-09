<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail( Request $request)
    {
//        dd($request->all());

        Mail::send('email',[] , function ($m) {
           $m->from('amirgee007@yahoo.com','topic');

           $m->to('amir@codebrisk.com', 'wasin')->subject('lol');
       });

    }

//    public function sendGiftRecipientEmail(Request $request)
//    {
//
//        $subscription_id = $request->subscription_id;
//
//        $giftEmail = GiftRecipient::where('subscription_id', $subscription_id)->first();
//
//        $view = ($giftEmail->giftOccasion == 'christmas') ? 'emails.gifts.christmas' : 'emails.gifts.default';
//
//        Mail::send($view, ['giftEmail' => $giftEmail], function ($m) use ($giftEmail) {
//            $m->from('hello@sayitwithasock.com', 'Say it with a Sock');
//            $m->to($giftEmail->recipient_email, $giftEmail->recipientfirst)->subject('Someone Gave You A Sock Subscription!');
//            $m->bcc('daniel+allemails@sayitwithasock.com', $name = null);
//        });
//
//        EmailLog::create([
//            'email_address' => $giftEmail->recipient_email,
//            'email_type' => config('services.gift_recipient_id')
//        ]);
//
//        return back();
//    }

//
//if ( !EmailLog::alreadySent($recipient_email)) {
//$emails[] = $recipient_email;
////                      return view('emails.feedback', compact('allocated_pro'));
//if(!empty($recipient_email)){
//if (!in_array($recipient_email, $testing)) {
//array_push($testing, $recipient_email);
//}else{
//    $stat .= $recipient_email.' <br>';
//}
//try{
//    Mail::send('emails.feedback', compact('allocated_pro' , 'recipient_email'), function ($m) use ($recipient_email, $recipient_name) {
//        $m->to($recipient_email, $recipient_name)->subject('Have 30 Seconds? Say it with a Sock Needs Your Feedback!');
//        $m->bcc('daniel+allemails@sayitwithasock.com', $name = null);
//    });
//}catch (\Exception $e){
//    Log::error('emails.feedback', $e->getTrace());
//}
//
//FeedbackEmailLog::create([
//    'subscription_id' => $subscription->subscription_id
//]);
//
//EmailLog::create([
//    'email_address' => $recipient_email,
//    'email_type' => config('services.feedback_email_type_id')
//]);
//$i++;
//}
//}


}

