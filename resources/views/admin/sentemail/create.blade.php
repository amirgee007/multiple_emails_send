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

        @include('admin.alerts.alert')

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
                                <select class="form-control " title="Select Category" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--todo: get all the emails on select change via jquery later--}}
                            {{--<div class="form-group">--}}
                                {{--<select class="form-control " title="Select Category" name="category" required>--}}
                                    {{--<option value="">Select Category</option>--}}
                                    {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{ $category->id }}" @if(in_array($category->slug , $userRoles)) selected="selected" @endif >{{ $category->name}}</option>--}}
                                        {{--<option value="{{ $category->id }}" >{{ $category->title}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <input class="form-control" name="subject" placeholder="Write Subject" required>
                            </div>

                            <div class="form-group">
                                <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
                                    <h3> Email here.....</h3>
                                </textarea>
                            </div>


                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Attachment
                                    <input type="file" name="attachment">
                                </div>
                                <p class="help-block">Max. 32MB</p>
                            </div>


                        </div>
                            <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <a class="btn btn-default" href="{{route('sentemail.index')}}"><i class="fa fa-times"></i> Go To Back</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer_scripts')
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


@endsection

