<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(15);
        return view('admin.customers.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    public function customersCsvUpload(Request $request)
    {
        try {

            Storage::put('customers_bulk_file.csv',file_get_contents($request->file('file')->getRealPath()));

            $count = 0;
            $customers = Excel::load(storage_path('app/customers_bulk_file.csv'), function ($reader) {})->get()->toArray();

                foreach ($customers as $customer) {
                   $customer =  Customer::updateOrCreate(['email' => $customer['email']] ,$customer);
                    $count++;
                }

                Log::info($count.' customer added in the database out of '.count($customers));


            session()->flash('app_message', $count.' customers successfully added in the database out of '.count($customers));

            return back();

        } catch (\Exception $ex) {
            session()->flash('error_error', $ex->getMessage());
            return back();
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

        Customer::where('id' , $id) ->delete();
        session()->flash('alert-info', 'Customer has been Successfully deleted!');

        return back();
    }
}
