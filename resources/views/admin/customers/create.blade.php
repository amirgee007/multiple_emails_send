@extends('admin.layouts.app')

@section('title')
    Create Customer
    @parent
@stop

@section('header_styles')

    <style>

        #hide input[type=file] {
            display:none;
            margin:10px;
        }
        #hide input[type=file] + label {
            display:inline-block;
            margin:20px;
            padding: 4px 32px;
            background-color: #FFFFFF;
            border:solid 1px #666F77;
            border-radius: 6px;
            color:#666F77;
        }
        #hide input[type=file]:active + label {
            background-image: none;
            background-color:#2D6C7A;
            color:#FFFFFF;
        }
    </style>
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
        @include('admin.customers.modals')

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Customer</h3>
                            <a href="javascript:void(0)" class="btn btn-success" id="add_customers_csv_btn" style="float: right">Add Customers by Csv</a>
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

    </div>
@endsection

@section('footer_scripts')
    <script>

        $('#add_customers_csv_btn').on('click', function () {
            $('#add_customers_csv_modal').modal('show');
        });

    </script>
@endsection

