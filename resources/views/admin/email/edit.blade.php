@extends('admin/layout')

@section('title')
    Edit Email
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
                <small>Edit Emails</small>
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
                            <h3 class="box-title">Edit Email</h3>
                        </div>
                        <form role="form" method="post" action="{{route('email.update',$email->id)}}">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tittle">Write Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$email->email or ''}}" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control " title="Select Category" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($email->category_id == $category->id) selected="selected" @endif >{{ $category->id}}</option>
                                            <option value="{{ $category->id }}" >{{ $category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update Email</button>
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
    </script>

@endsection

