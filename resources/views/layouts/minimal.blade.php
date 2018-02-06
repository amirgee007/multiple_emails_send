<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Jan 18 2018 23:01:19 GMT+0000 (UTC)  -->
<html data-wf-page="5a611db23ca2910001e13b2f" data-wf-site="59f11272ffa06300013ad9be">
<head>
    <meta charset="utf-8">
    <title>
        @section('title') | Say it with a Sock
        @show
    </title>
    <meta content="Feedback" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="{{ asset('assets/feedback/css/normalize.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/feedback/css/webflow.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/feedback/css/sayitwithasock.webflow.css') }}" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Muli:200,regular,700,800,900","Lemon:regular","Katibeh:regular"]  }});</script>
    <script src="https://use.typekit.net/shx4dse.js" type="text/javascript"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">

    <!-- page level css Start -->
@yield('header_styles')
<!-- //page level css End -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/demo/css/styles.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/fontawesome-stars.css')}}">

</head>
<body class="body-6">

@yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/feedback/js/webflow.js') }}" ></script>

<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{url('assets/js/jquery.barrating.js')}}"></script>


@yield('footer_scripts')
</html>