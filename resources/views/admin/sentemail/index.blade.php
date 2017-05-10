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



        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('sentemail.sendNew')}}" class="btn btn-primary btn-block margin-bottom">Compose New</a>
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Folders</h3>
                            <div class="box-tools">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"></span></a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right"></span></a></li>
                                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Emails</h3>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <div class="mailbox-controls">
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Send To</th>
                                        <th>Subject</th>
                                        <th>Contents</th>
                                        <th>Send At</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach(($sentEmails) as $email)
                                        <tr>
                                            <td><a target="_blank" href="{{route('sentemail.show' ,$email->id)}}"><i class="fa fa-star text-yellow"></i>{{$email->id}}</a></td>
                                            <td>{{$email->category_id}}</td>
                                            <td>{{$email->email_address}}</td>
                                            <td>{{$email->subject}}</td>
                                            <td><a target="_blank" href="{{route('sentemail.show' ,$email->id)}}">{{substr($email->content, 0, 30)}}.....</a></td>
                                            <td>{!! isset($email->created_at) ? @$email->created_at->diffForHumans() : 'Not Set'!!}</td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>




                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="box-footer no-padding">
                            <div class="mailbox-controls">
                                <br/>
                                {{--<!-- Check all button -->--}}
                                {{--<button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>--}}
                                    {{--<button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>--}}
                                    {{--<button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>--}}
                                {{--</div><!-- /.btn-group -->--}}
                                {{--<button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>--}}
                                {{--<div class="pull-right">--}}
                                    {{--1-50/200--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>--}}
                                        {{--<button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>--}}
                                    {{--</div><!-- /.btn-group -->--}}
                                {{--</div><!-- /.pull-right -->--}}
                            </div>
                        </div>
                    </div>
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

    <script>

        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });

            //Handle starring for glyphicon and font awesome
            $(".mailbox-star").click(function (e) {
                e.preventDefault();
                //detect type
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");

                //Switch states
                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }

                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
            });
        });
        $(document).ready(function () {

//            $("#roles").select2({
//                placeholder: 'Select Roles'
//            });
        });
    </script>

@endsection

