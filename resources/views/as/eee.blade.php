<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if (Session::has('ee'))
    @if (Session::has('nulls'))
        <div class="alert alert-success animated alerted-drop-down justify-content-center" role="alert">
            <h4 class="alert-heading">Warning !</h4>
            <p>{{ Session::get('nulls') }}.</p>
            <center><button class="button-alert">close</button></center>
        </div>
    @endif

    <!--<div class="alert alert-danger" style="float: left"></div> -->
@endif

</body>
</html>
