@extends('admin/layout')

@section('title')
    Send Email
    @parent
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


        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Read E-Mail</h3>
                            <div class="box-tools pull-right">
                                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>Subject: {{$sentEmail->subject}}</h3>
                                <h5>From:  {{$sentEmail->email_address}} <span class="mailbox-read-time pull-right">{!! isset($sentEmail->created_at) ? @$sentEmail->created_at->toDayDateTimeString() : 'Not Set'!!}</span></h5>
                            </div>
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group"></div>

                            </div>
                            <div class="mailbox-read-message">
                                {{$sentEmail->content}}
                            </div>
                        </div>
                        <div class="box-footer">
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a class="btn btn-default" href="{{route('sentemail.index')}}"><i class="fa fa-reply"></i> Go Back</a>
                                <a class="btn btn-default" href="{{route('sentemail.index')}}"><i class="fa fa-share"></i> Go Forward</a>
                            </div>
                            <a class="btn btn-default" href="{{route('sentemail.delete' , $sentEmail->id)}}"><i class="fa fa-trash-o"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer_scripts')
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#compose-textarea").wysihtml5();

        });
    </script>

@endsection

