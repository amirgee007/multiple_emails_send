<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Email;
use App\Models\Customer;
use App\Models\SentEmail;
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

        $sentEmails =SentEmail::paginate(15);
        return view('admin.sentemail.index', compact('sentEmails' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers =Customer::all();
        return view('admin.sentemail.create', compact('customers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->selection=='selected')
            $customers = Customer::whereIn('id' ,$request->customer_ids)->get();
        else
            $customers = Customer::Active()->get();

        $success = 0;
        $data = $request->except('_token','_wysihtml5_mode','customer_ids' ,'selection');
        foreach ($customers as $customer){
            $isSendEmail = $this->sendEmailToCustomer($data ,$customer->email);
             if($isSendEmail){
                 $data['sent_to'] = $customer->id;
                 SentEmail::create($data);
                 $success++;
             }

             else
                 continue;
        }

        session()->flash('alert-success', $success. 'Emails has been Successfully send and stored!');
        return redirect()->route('sentemail.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function sendEmailToCustomer($data ,$to)
    {

        $subject = $data['subject'];
        $cc = $data['cc'];
        $content = $data['content'];
        $attach = isset($data['attachments']) ? $data['attachments'] : null;


        //todo: make queue for large number of emails
        Mail::send('admin.send', ['subject' => $subject, 'content' => $content],
            function ($message )

        use ($attach , $subject , $to ,$cc){
            $message->from('admin@admin.com', 'Admin');
            $message->to($to);
            $message->cc($cc);
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
       SentEmail::where('id' ,$id)->delete();
        session()->flash('app_message', ' Sent Email deleted successfully');

       return redirect()->route('sentemail.index');

    }
}
