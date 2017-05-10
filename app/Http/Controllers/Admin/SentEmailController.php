<?php

namespace App\Http\Controllers\Admin;

use App\SentEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.sentemail.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function show(SentEmail $sentEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SentEmail  $sentEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(SentEmail $sentEmail)
    {
        //
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
    public function destroy(SentEmail $sentEmail)
    {
        //
    }
}
