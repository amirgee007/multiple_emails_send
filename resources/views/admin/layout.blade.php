<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('title')
            | Dashboard
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

    {!! Html::style('plugins/datepicker/datepicker3.css') !!}

    {!! Html::style('plugins/daterangepicker/daterangepicker-bs3.css') !!}

    {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header_styles')
</head>

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    @if(Auth::user() &&  Auth::user()->is_admin)
            @include('admin.header.header');
            @include('admin.sidebar.sidebar');
            @yield('content')

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.

            </footer>

            <div class="control-sidebar-bg"></div>

        @else
            @yield('content')


        @endif


        {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {!! Html::script('plugins/morris/morris.min.js') !!}
        {!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
        {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
        {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
        {!! Html::script('plugins/knob/jquery.knob.js') !!}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

        {!! Html::script('plugins/daterangepicker/daterangepicker.js') !!}
        {!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}
        {!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysiHtml5.all.min.js') !!}
        {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
        {!! Html::script('dist/js/app.min.js') !!}
        {!! Html::script('dist/js/pages/dashboard.js') !!}
        {!! Html::script('dist/js/demo.js') !!}

        @yield('footer_scripts')

    </div>
    </body>
</html>