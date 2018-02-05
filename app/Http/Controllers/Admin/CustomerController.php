<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers =Customer::all();

        return view('admin.customers.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            Customer::updateOrCreate(['email' => $request->email] ,$request->except('_token'));
            session()->flash('alert-success', 'Customer has been Successfully Created!');

        } catch (\Exception $ex) {
            session()->flash('alert-danger', $ex->getMessage());
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer =Customer::where('id' , $id)->first();

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $customer = Customer::where('id' , $id)->first();

        $customer->update($request->except('_token'));
        session()->flash('alert-success', 'Customer has been Successfully Updated!');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::where('id' , $id) ->delete();
        session()->flash('alert-info', 'Category has been Successfully deleted!');

        return redirect()->route('category.index');
    }
}
