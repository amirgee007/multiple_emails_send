<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style type="text/css">
        /* Space out content a bit */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
        form {
            margin-bottom: 18px;
        }
        /* Custom page header */
        .header {
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 10px 0;
        }
        .required-fields {
            text-align: right;
        }
        .required-fields span {
            color: #a94442;
            font-weight: bold;
        }
        .list-group-item label {
            font-weight: normal;
            margin-top: 17px;
        }
        .list-group-item label input[type="checkbox"] {
            margin-right: 4px;
        }
        .form-group span.required {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 20px;
            color: #a94442;
            font-weight: bold;
            user-select: none;
        }
        label.error {
            color: #a94442;
            font-weight: bold;
            margin-top: 4px;
        }
        .form-actions {
            margin: 25px 0;
        }
        .form-control + .form-control {
            margin-top: 6px;
        }
        .panel-group .panel-title .closed-icon,
        .panel-group .panel-title .open-icon {
            margin-right: 0.5em;
            top: 2px;
        }
        .panel-group .panel-title a:hover,
        .panel-group .panel-title a:active {
            text-decoration: none;
        }
        .panel-group .panel-title a:hover .text,
        .panel-group .panel-title a:active .text {
            text-decoration: underline;
        }
        .panel-group .panel-title .closed-icon { display: none; }
        .panel-group.closed .panel-title .open-icon { display: none; }
        .panel-group.closed .panel-title .closed-icon { display: inline; }
        /* Custom page footer */
        .footer {
            padding-top: 18px;
            border-top: 1px solid #e5e5e5;
        }
        /* Customize container */
        @media (min-width: 768px) {
            .container {
                max-width: 730px;
            }
        }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="header">
        <img  width="100%" src="http://blog.seh-hotels.com/wp-content/uploads/2016/04/week-end-nature-1.jpg" />
        <h1>We're unsubscribing you!</h1>
    </div>

    <form action="{{route('unsubscribe.save')}}" method="POST" role="form" class="form-horizontal">
        {{csrf_field()}}
        @if(Session::has('alert-success'))
        <div class="flash-message">
            <p class="alert alert-success">{{ Session::get('alert-success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        </div>
        @else
        @if(Session::has('alert-danger'))
        <div class="flash-message">
            <p class="alert alert-danger">{{ Session::get('alert-danger') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        </div>
        @endif
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email Address</label>
            <div class="col-sm-9">
                <input required autofocus type="email" class="form-control" id="email" name="email" value="" />
            </div>
        </div>

        </br>
        <div class="form-group">
            <label for="interests" class="col-sm-3 control-label">Reasons</label>
            <div class="col-sm-9">

                <div class="radio">
                    <label>
                        <input checked type="radio" name="unsub_reason" value="Emails are inappropriate" />
                        Emails are inappropriate
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="unsub_reason" value="Spam emails" />
                        Spam emails
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="unsub_reason" value="I don't like these" />
                        I don't like these
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="unsub_reason" value=" Too many emails"/>
                        Too many emails
                    </label>
                </div>
            </div>
        </div>

        <div class="clearfix form-actions">
            <div class="pull-right">
                <button type="submit" class="btn btn-default btn-danger">Unsubscribe me</button>
            </div>
        </div>
        @endif

    </form>

    <footer class="footer">
        <p>
            &copy; 2018 @All rights reserved &mdash; <a href="#" target="_blank">emails.msaeed</a>
        </p>
    </footer>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>

<script>



</script>

</body>
</html>