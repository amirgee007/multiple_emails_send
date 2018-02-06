@extends('admin.layouts.app')

@section('title')
    Login
    @parent
@stop

@section('header_styles')

    {!! Html::style('plugins/iCheck/square/blue.css') !!}

@endsection

<div class="wrapper">
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b style="color: wheat">Admin</b> Emails</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{url('admin')}}" method="post" >
            {{csrf_field()}}


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>

        {{--<a href="#">I forgot my password</a><br>--}}
        {{--<a href="#" class="text-center">Register a new membership</a>--}}

    </div>
</div>
</div>

@endsection

@section('footer_scripts')
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('plugins/iCheck/icheck.min.js') !!}

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

    <script>
        $(document).ready(function () {

        });
    </script>

@endsection

