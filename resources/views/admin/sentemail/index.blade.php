@extends('admin.layouts.app')

@section('title')
    All Sent Emails
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
                <div class="col-md-12">
                    <div class="box box-primary">
                        <a href="{{route('sentemail.sendNew')}}" class="btn btn-primary btn-block margin-bottom">Compose New</a>
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
                                        <th>To</th>
                                        <th>Subject</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Pic</th>
                                        <th>End Text</th>
                                        <th>CC</th>
                                        <th>Send At</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach(($sentEmails) as $email)
                                        <tr>
                                            <td><a target="_blank" href="{{route('sentemail.show' ,$email->id)}}"><i class="fa fa-star text-yellow"></i>{{$email->id}}</a></td>
                                            <td>{{$email->customer->email}}</td>
                                            <td>{{$email->subject}}</td>
                                            <td>{{$email->title}}</td>
                                            <td><a  target="_blank" href="{{route('sentemail.show' ,$email->id)}}">{{substr($email->description, 0, 30)}}...</a></td>
                                            <td><img align="center" alt="Image not load" src="{{$email->picture_url}}" width="50" height="50"></td>
                                            <td><a  target="_blank" href="{{route('sentemail.show' ,$email->id)}}">{{substr($email->end_text, 0, 30)}}...</a></td>
                                            <td>{{$email->cc}}</td>
                                            <td>{!! isset($email->created_at) ? @$email->created_at->diffForHumans() : 'Not Set'!!}</td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="pull-right box-body"> {{ $sentEmails->links() }}</div>
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

