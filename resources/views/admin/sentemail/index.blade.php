@extends('admin/layout')

@section('title')
    All Emails
    @parent
@stop

@section('header_styles')

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
                                            {{--<td><a style="font-size: 12px" target="_blank" href="{{route('sentemail.show' ,$email->id)}}">{!!substr($email->content, 0, 30)!!}.....</a></td>--}}
                                            <td><a  target="_blank" href="{{route('sentemail.show' ,$email->id)}}">{{substr($email->content, 0, 30)}}.....</a></td>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@section('footer_scripts')

@endsection

