@extends('admin.layouts.app')

@section('title')
    Edit Customer
    @parent
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Customer
                <small>Edit Customer</small>
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
                            <h3 class="box-title">Edit Customer</h3>
                        </div>
                        <form role="form" method="post" action="{{route('customer.update' , $customer->id)}}">
                            <div class="box-body">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="tittle">First Name</label>
                                    <input required type="text" class="form-control" id="tittle" name="first_name" value="{{$customer->first_name}}" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Last Name</label>
                                    <input required type="text" class="form-control" id="tittle" name="last_name" value="{{$customer->last_name}}" placeholder="Enter Last Name">
                                </div>

                                <div class="form-group">
                                    <label for="tittle">Email</label>
                                    <input required type="email" class="form-control" id="tittle" name="email" value="{{$customer->email}}" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Phone</label>
                                    <input type="number" class="form-control" id="tittle" name="phone" value="{{$customer->phone}}" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="tittle">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}" placeholder="Enter address">
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update New</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('footer_scripts')


@endsection

