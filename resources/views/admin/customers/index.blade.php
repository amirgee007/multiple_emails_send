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
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Customer</h3>
                        </div>
                        <form role="form" method="post" action="{{route('customer.add')}}">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tittle">First Name</label>
                                    <input required type="text" class="form-control" id="tittle" name="first_name" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Last Name</label>
                                    <input required type="text" class="form-control" id="tittle" name="last_name" placeholder="Enter Last Name">
                                </div>

                                <div class="form-group">
                                    <label for="tittle">Email</label>
                                    <input required type="email" class="form-control" id="tittle" name="email" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Phone</label>
                                    <input type="number" class="form-control" id="tittle" name="phone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add New Customer</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>



        </section>

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
                </div>
            </div>
        </section>

    </div>
@endsection

@section('footer_scripts')

@endsection

