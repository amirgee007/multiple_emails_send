@extends('admin/layout')

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
        <a href="#"><b style="color: wheat">Admin</b> LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{url('admin/dashboard')}}" method="post" >
            {{csrf_field()}}

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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

        <a href="#">I forgot my password</a><br>
        <a href="#" class="text-center">Register a new membership</a>

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

