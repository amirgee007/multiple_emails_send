@extends('admin/layout')

@section('title')
    All Emails
    @parent
@stop

@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/validation/dist/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/iCheck/skins/minimal/blue.css') }}" rel="stylesheet"/>
    <link href="{{ public_path('plugins/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/custom_css/addnew_user.css') }}" rel="stylesheet">
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Emails
                <small>Add Emails</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Email</li>
            </ol>
        </section>

        @include('admin.alerts.alert')

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Email</h3>
                        </div>
                        <form role="form" method="post" action="{{route('email.add')}}">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tittle">Write Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control " title="Select Category" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{ $category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save Email</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>



        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Emails</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Category Id</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(($emails) as $email)
                        <tr>
                            <td>{{$email->id}}</td>
                            <td>{{$email->email}}</td>
                            <td>{{$email->category_id}}</td>
                            <td>{!! isset($email->created_at) ? @$email->created_at->diffForHumans() : 'Not Set'!!}</td>
                            <td>

                                    <a href="{{route('email.edit' , $email->id)}}"><i class="fa fa-fw fa-pencil text-warning"></i></a>

                                     <a href="#"><i class="fa fa-fw fa-eye text-primary"></i></a>

                                    <a onclick="return confirm('Are you sure to delete ?')" href="{{route('email.delete' , $email->id)}}"><i class="fa fa-fw fa-times text-danger"></i></a>

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

    <script>
        $(function () {
            $(".select2").select2();

            $("#roles").select2({
                placeholder: 'Select Roles'
            });

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@endsection

