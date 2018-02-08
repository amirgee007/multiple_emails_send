<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('title')
            | Emails Msaeed
        @show
    </title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {!! Html::style('dist/css/AdminLTE.min.css') !!}

    {!! Html::style('dist/css/skins/_all-skins.min.css') !!}

    {!! Html::style('plugins/iCheck/flat/blue.css') !!}

    {!! Html::style('plugins/morris/morris.css') !!}

    {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}

    {!! Html::style('plugins/select2/select2.min.css') !!}

    {!! Html::style('plugins/datepicker/datepicker3.css') !!}

    {!! Html::style('plugins/daterangepicker/daterangepicker-bs3.css') !!}

    {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

    <link href="{{ asset('assets/toastr/css/toastr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/toastr/toastr.css') }}" rel="stylesheet"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header_styles')
</head>

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    @if(Auth::user())
            @include('admin.layouts.header');
            @include('admin.layouts.sidebar');

            @yield('content')

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2017-2018 <a href="https://web.facebook.com/amirgee007?_rdc=1&_rdr">M Amir Shahzad</a>.</strong> All rights reserved.
            </footer>

            <div class="control-sidebar-bg"></div>

        @else
            @yield('content')
        @endif

        {{--<script src="{{asset ('/public/plugins/datatableprintcsv/jquery-1.12.4.js') }}"></script>--}}
        {{--<script src="{{asset ('/public/plugins/datatableprintcsv/jquery.dataTables.min.js') }}"></script>--}}
        {{--<script src="{{ url('https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js') }}"></script>--}}

        <script type="text/javascript" src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script type="text/javascript" src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysiHtml5.all.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/dist/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/toastr/js/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/toastr/js/pages/ui-toastr.js') }}"></script>

        <script>
            $(document).ready(function () {

                $("#compose-textarea").wysihtml5();

                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 4000);
            });



            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-bottom-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "slideDown",
                "hideMethod": "fadeOut"
            };


            @if (Session::has('app_info'))
            toastr.info("{{ Session::get('app_info') }}", "Message");
            @endif

            @if (Session::has('app_message'))
            toastr.success("{{ Session::get('app_message') }}", "Message");
            @endif

            @if (Session::has('app_warning'))
            toastr.warning("{{ Session::get('app_warning') }}", "Message");
            @endif

            @if (Session::has('app_error'))
            toastr.error("{{ Session::get('app_error') }}", "Message");
            @endif


        </script>

        @yield('footer_scripts')

    </div>
    </body>
</html>