@extends('admin.layouts.app')

@section('title')
    Send Email
    @parent
@stop

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/select2/select2.min.css') }}"/>
{{--    <link href="{{ asset('/assets/summernote/summernote.css') }}" rel="stylesheet"  type="text/css"/>--}}
    {{--<link href="{{ asset('/css/refresh-btn.css') }}" rel="stylesheet"  type="text/css"/>--}}
{{--    <link href="{{ asset('/assets/summernote/font/summernote.ttf') }}" rel="stylesheet"  type="text/css"/>--}}
{{--    <link href="{{ asset('/assets/summernote/font/summernote.woff') }}" rel="stylesheet"  type="text/css"/>--}}

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
                                <input class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                @if ($errors->has('subject'))
                                    <span class="help-block"><strong>{{ $errors->first('subject') }}</strong></span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="tittle">Title</label>
                                <input class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="tittle">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" required rows="4">{{old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('picture_url') ? ' has-error' : '' }}">
                                <label for="tittle">Picture Url</label>
                                <input class="form-control" name="picture_url" placeholder="Picture Url" value="{{ old('picture_url') }}" required>
                                @if ($errors->has('picture_url'))
                                    <span class="help-block"><strong>{{ $errors->first('picture_url') }}</strong></span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="tittle">End Text</label>
                                <textarea class="form-control" name="end_text" placeholder="End Text" required rows="2">{{old('end_text') }}</textarea>
                                @if ($errors->has('end_text'))
                                    <span class="help-block"><strong>{{ $errors->first('end_text') }}</strong></span>
                                @endif
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
{{--    <script  src="{{ asset('assets/summernote/summernote.js') }}"  type="text/javascript"></script>--}}

    <script type="text/javascript" src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>

    <script>

        $(function () {

//            $('#ckeditor_full_summernote').summernote({
//                height: 500
//            });

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

