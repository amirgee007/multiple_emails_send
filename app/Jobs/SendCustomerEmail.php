<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Models\SentEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCustomerEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 2000;
    public $request;
    public $CC='amirgee007@yahoo.com';


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if($this->request['selection']=='selected')
            $customers = Customer::whereIn('id' ,$this->request['customer_ids'])->get();
        else
            $customers = Customer::Active()->get();

        $success = 0;
        foreach ($customers as $customer){
            $isSendEmail = $this->sendEmailToCustomer($this->request ,$customer->email);
            if($isSendEmail){
                $data['sent_to'] = $customer->id;
                $data['subject'] = $this->request['subject'];
                $data['title'] = $this->request['title'];
                $data['description'] = $this->request['description'];
                $data['end_text'] = $this->request['end_text'];
                $data['picture_url'] = $this->request['picture_url'];
                $data['cc'] = $this->CC;

                SentEmail::create($data);
                $success++;
            }

            else
                continue;
        }

        Log::info($success. "Emails has been Successfully send and stored!");

    }


    public function sendEmailToCustomer($data ,$to)
    {

        $subject = $data['subject'];
        $title = $data['title'];
        $description = $data['description'];
        $end_text = $data['end_text'];
        $image = $data['picture_url'];
        $cc = $this->CC;

        $view = 'admin.tempelates.email_tempelate1';

        Mail::send($view, compact('title','image','end_text','description'),

            function ($message )use ( $subject , $to ,$cc){
                $message->from('admin@admin.com', 'Admin');
                $message->to($to);
                $message->cc($cc);
                $message->subject($subject);
            });

        if (Mail::failures()) {
            return false;
        }

        return true;

    }


}
