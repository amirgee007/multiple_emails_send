@extends('admin.layouts.app')

@section('title')
    Send Email
    @parent
@stop

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}"/>
@stop


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
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
                                    <label for="from">To All Or Particular</label>
                                    <input type="email" class="form-control" name="from" placeholder="From" required>
                                </div>
                            <div class="form-group">
                                <label for="customer_id">To</label>
                                <select id="customer_id" name="customer_ids[]" required class="form-control select2" multiple="multiple" data-placeholder="Select a Customer" style="width: 100%;">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" >{{ $customer->first_name.' '.$customer->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="email" class="form-control" name="from" placeholder="From" required>
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
                                <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
                                    <h3> Email here.....</h3>
                                </textarea>
                            </div>


                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Add Attachment in an Email
                                    <input type="file" name="attachments">
                                </div>
                                <p class="help-block">Max. 32MB</p>
                            </div>


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
    <script type="text/javascript" src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>

    <script>

        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection

