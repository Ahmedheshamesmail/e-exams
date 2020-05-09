<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Admin Page</title>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav>
    <center>
         @if (Session::has('nulls'))
            <div class="alert alert-success animated alerted-drop-down justify-content-center" role="alert">
                <h4 class="alert-heading">Warning !</h4>
                <p>{{ Session::get('nulls') }}.</p>
                <center><button class="button-alert">close</button></center>
            </div>
        @endif
        <div style="width: 200px;margin-top: 30vh;font-size: 20px">
            <form action="updatemypass" method="post">
                {{csrf_field()}}
                <input type="hidden" name="student" value="{{$student}}">
                Password : <br><br>
                <input type="text" name="password" placeholder="Password .." class="form-control"><br>
                <input type="submit" class="btn btn-primary" value="Set">
            </form>
        </div>
    </center>
<script src="js/app.js" type="text/javascript"></script>
</body>
</html>
