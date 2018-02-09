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
                $data['cc'] = $this->request['cc'];
                $data['subject'] = $this->request['subject'];
                $data['content'] = $this->request['content'];
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


}
