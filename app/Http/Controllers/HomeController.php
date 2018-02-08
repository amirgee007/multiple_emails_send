<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
//        $this->middleware('auth');
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

    public function unsubscribeSave(Request $request)
    {
        
        try{
            
           $update =  Customer::Active()->where('email' ,$request->email)->update(['is_active' => 0 ,'unsub_reason' => $request->unsub_reason]);

           if($update)
            session()->flash('alert-success', 'You are Successfully Unsubscribd!');
            else
                session()->flash('alert-danger', 'No record found!');

            return back();
        }

        catch (\Exception $ex) {

            session()->flash('alert-danger', 'Some thing went wrong please try again.');

            return back();
        }

    }

}

