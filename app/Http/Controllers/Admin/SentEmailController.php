<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Email;
use App\SentEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SentEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sentEmails =SentEmail::all();

        return view('admin.sentemail.index', compact('sentEmails' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return view('admin.sentemail.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sent_emails = New SentEmail();

        $email_list = Email::where('category_id' , $request->category_id)->pluck('email');

        foreach ($email_list as $email){

            $request->request->add(['email_address' => $email]);

            $isSendEmail = $this->sendEmailToall($request);

             if($isSendEmail){
                 $sent_emails->create($request->all());
             }

        }

        session()->flash('alert-success', 'Emails has been Successfully send and stored!');
        return redirect()->route('sentemail.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sentEmail = SentEmail::where('id' , $id) ->first();
        return view('admin.sentemail.show', compact('sentEmail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function sendEmailToall(Request $request)
    {

        $subject = $request->input('subject');
        $content = $request->input('content');
        $sendTo = $request->input('email_address');
        $attach = $request->file('attachment');


      //todo: make queue for large number of emails
      Mail::send('admin.send', ['subject' => $subject, 'content' => $content], function ($message )

      use ($attach , $subject , $sendTo){
            $message->from('amirgee007@yahoo.com', 'Amir Shahzad');
            $message->to($sendTo);

            $message->subject($subject);

          if ($attach) {

              $message->attach($attach->getRealPath(), array(
                      'as' => 'resume.' . $attach->getClientOriginalExtension(),
                      'mime' => $attach->getMimeType())
              );
            }

        });

        if (Mail::failures()) {
           return false;
        }

        return true;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SentEmail $sentEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id , 'id delete');
        //go back to show all page

        return redirect()->route('sentemail.index');

    }
}
