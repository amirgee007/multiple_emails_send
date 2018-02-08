@extends('admin.layouts.app')

@section('title')
    Send Email
    @parent
@stop

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}"/>
    <link href="{{ asset('/assets/summernote/summernote.css') }}" rel="stylesheet"  type="text/css"/>
    {{--<link href="{{ asset('/css/refresh-btn.css') }}" rel="stylesheet"  type="text/css"/>--}}
    <link href="{{ asset('/assets/summernote/font/summernote.ttf') }}" rel="stylesheet"  type="text/css"/>
    <link href="{{ asset('/assets/summernote/font/summernote.woff') }}" rel="stylesheet"  type="text/css"/>

@stop


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1 style="float: left">
                Email
                <small>Send Email</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Send Email</li>
            </ol>
        </section>

        @include('admin.layouts.alert')

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Email</h3>
                        </div>
                        <form method="post" action="{{route('sentemail.sendNew.save')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">

                            <div class="form-group">
                                <label class="radio-inline" style=""><input type="radio" required name="selection" value="selected" checked>To Selected Customer</label>
                                <label class="radio-inline" style=""><input type="radio" required name="selection" value="all" >To All Customers</label>
                            </div>

                            <div class="form-group">
                                <label for="customer_ids">To</label>
                                <select id="customer_ids" name="customer_ids[]" required class="form-control select2" multiple="multiple" data-placeholder="Select a Customer" style="width: 100%;">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" >{{ $customer->first_name.' '.$customer->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tittle">Subject</label>
                                <input class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="form-group">
                                <label for="tittle">CC</label>
                                <input class="form-control" type="email" name="cc" placeholder="CC" required>
                            </div>

                            <div class="form-group">
                                <label for="tittle">Message</label>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<div class="btn btn-default btn-file">--}}
                                    {{--<i class="fa fa-paperclip"></i> Add Attachment in an Email--}}
                                    {{--<input type="file" name="attachments">--}}
                                {{--</div>--}}
                                {{--<p class="help-block">Max. 32MB</p>--}}
                            {{--</div>--}}

                        </div>
                            <div class="box-footer">
                            <div class="pull-right">
                                <a class="btn btn-default" href="{{route('sentemail.index')}}"><i class="fa fa-times"></i> Go Back</a>
                            </div>
                                <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-envelope-o"></i> Send To All</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer_scripts')
    <script  src="{{ asset('assets/summernote/summernote.js') }}"  type="text/javascript"></script>

    {{--<script type="text/javascript" src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>

    <script>

        $(function () {

            $('#ckeditor_full_summernote').summernote({
                height: 500
            });

            $('input[type=radio][name=selection]').change(function() {
                if (this.value == 'selected') {
                    $('#customer_ids').prop('required',true);
                    $('#customer_ids').prop('disabled',false);
                }
                else if (this.value == 'all') {
                    $(".select2").select2("val", "");
                    $('#customer_ids').prop('required',false);
                    $('#customer_ids').prop('disabled',true);
                }
            });

            $(".select2").select2({
                placeholder: "Select a customer"
            });

        });
    </script>
@endsection

