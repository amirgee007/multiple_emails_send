@extends('admin.layouts.app')

@section('title')
    All Customers
    @parent
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Customer
                <small>Add Customer</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Customer</li>
            </ol>
        </section>
        @include('admin.layouts.alert')

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Customers</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{!! isset($customer->created_at) ? @$customer->created_at->diffForHumans() : 'n/a'!!}</td>
                            <td>
                                <a href="{{route('customer.edit' , $customer->id)}}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                                <a href="javascript:void(0)"><i class="fa fa-fw fa-eye text-primary"></i></a>
                                <a onclick="return confirm('Are you sure to delete ?')" href="{{route('customer.delete' , $customer->id)}}"><i class="fa fa-fw fa-times text-danger"></i></a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right box-body"> {{ $customers->links() }}</div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('footer_scripts')

@endsection

