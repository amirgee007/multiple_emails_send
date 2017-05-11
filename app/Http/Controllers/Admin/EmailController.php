<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    protected $model;

    public function __construct() {
        $this->model = new \App\Email();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $emails =Email::all();
        $categories =Category::all();

        return view('admin.email.index', compact('emails' , 'categories' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $isExisting = Email::where('email' , $request->email)->first();


        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) === false && !$isExisting) {

            $email = New Email();
            $email->create($request->all());
            session()->flash('alert-success', 'Email has been Successfully Created!');
            return back();

        } else {
            session()->flash('alert-danger', 'Email is not valid or already existing');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emails =Email::all();
        $email =$this->model->where('id' , $id)->first();

        $categories =Category::all();

        return view('admin.email.edit', compact('emails' , 'categories' , 'email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) === false) {

            $email = Email::where('id' , $id)->first();

            $email->update(['email' => $request->email]);
            session()->flash('alert-success', 'Email has been Successfully Updated!');
            return redirect()->route('email.index');

        } else {
            session()->flash('alert-danger', 'Email is not valid ');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Email::where('id' , $id) ->delete();
        session()->flash('alert-info', 'Emails has been Successfully deleted!');

        return redirect()->route('email.index');

    }
}
