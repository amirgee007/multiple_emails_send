<?php

namespace App\Http\Controllers\Admin;


use App\Jobs\AddCustomerCsv;
use App\Models\Customer;
use App\MSaeed\Helper;
use Carbon\Carbon;
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
            $job = (new AddCustomerCsv())->delay(Carbon::now()->addSeconds(1));

            dispatch($job);
            session()->flash('app_message', 'File has been upload and job will start shortly');

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
            $customer = Customer::updateOrCreate(['email' => $request->email] ,$request->except('_token'));
            $customer->update(['unique_url' => Helper::encrypt($customer->id)]);
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
