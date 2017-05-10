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

    {!! Html::style('plugins/select2/select2.min.css') !!}

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

    @if(Auth::user())
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
        {{--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>--}}
         <script src="/"></script>
        <script> $.widget.bridge('uibutton', $.ui.button);</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="/plugins/morris/morris.min.js"></script>
        <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="/plugins/knob/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysiHtml5.all.min.js"></script>
        <script src="/dist/js/pages/dashboard.js"></script>
        <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/plugins/select2/select2.full.min.js"></script>
        <script src="/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="/plugins/iCheck/icheck.min.js"></script>
        <script src="/plugins/fastclick/fastclick.min.js"></script>
        <script src="/dist/js/app.min.js"></script>
        <script src="/dist/js/demo.js"></script>



        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                    {
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function (start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });


            });
        </script>

        <script>
            $(document).ready(function () {

                $("#compose-textarea").wysihtml5();

                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 4000);
            });
        </script>

        @yield('footer_scripts')

    </div>
    </body>
</html>