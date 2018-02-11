<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Email;
use App\Jobs\SendCustomerEmail;
use App\Models\Customer;
use App\Models\SentEmail;
use Carbon\Carbon;
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
        $customers = Customer::Active()->get();
        return view('admin.sentemail.create', compact('customers'));
    }




    protected function validateImageUrl($url)
    {
        if (@getimagesize($url)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $valid = $this->validateImageUrl($request->picture_url);
       if(!$valid) {
           session()->flash('app_error', 'Image URL is invalid please add a valid URL');
           return redirect()->back()->withInput($request->all())->withErrors(
               ['picture_url' => 'URL is not valid']);
       }

        $job = (new SendCustomerEmail($request->all()))->delay(Carbon::now()->addSeconds(5));

        dispatch($job);
        session()->flash('app_message', ' Job has been Dispatched in the queue to send Emails');
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

        $title = $sentEmail->title;
        $description = $sentEmail->description;
        $end_text = $sentEmail->end_text;
        $image = $sentEmail->picture_url;

        $html_email = view('admin.tempelates.email_tempelate1',compact('title','image','end_text','description'));

        return view('admin.sentemail.show', compact('sentEmail','html_email'));

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
