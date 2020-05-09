<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

        <title>التسجيل</title>
        <link rel="stylesheet" href="../css/app.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/app.min.js"></script>
        <script src="../js/zepto.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/mainloginadmin.css" rel="stylesheet" type="text/css"/>
        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../pure-release-1.0.1/pure-min.css" >
        <link rel="stylesheet" href="../pure-release-1.0.1/grids-responsive-min.css" >
        <script src="../package/dist/sweetalert2.js"></script>
            <script src="../js/popper.js" type="text/javascript"></script>
            <script src="../js/app.js"></script>

    </head>
    <body style="  background: linear-gradient(to bottom,#9817b6,#bd1de2,#cf26d9,#de68e5,#e587ea);">
    @if (Session::has('nulls'))
    <div class="alert alert-success animated alerted-drop-down justify-content-center col-3" role="alert" >
            <h4 class="alert-heading">تنبيه !</h4>
            <p>{{ Session::get('nulls') }}.</p>
            <center><button class="button-alert">إغلاق</button></center>
        </div>
    @endif
    <p style="font-size: 20px;color: white;margin-bottom: 0;padding-left: 20px;padding-top: 20px;padding-bottom: 20px"><i style="padding:15px 10px;background-color: white;border-radius: 180px;margin-right: 3px;color: darkviolet;font-size: 20px">KFS </i>University</p>
    <a href="Professora" style="position: absolute;right: 50px;top: 10px;">
        <button class="btn btn-block">تسجيل</button>
    </a>
    <hr>
    <center style="padding-top: 20vh">
        <form style="padding: 15px;height: auto;width: 280px;background-color: white;box-shadow: -5px 2px 20px 2px gray;border-radius: 20px;" action="Login-Pa" method="post" class="pure-form pure-form-stacked">
            {{csrf_field()}}
            <legend class="text-primary">تسجيل الدخول <i class="fas fa-user"></i> </legend>
            <input type="tel" name="phone" placeholder="أدخل رقم الهاتف .." value="{{old('phone')}}">
            @error('phone')
            <div style="color: red;font-size: 13px">{{$message}}</div>
            @enderror

            <input type="password" name="password" placeholder="كلمة السر">
            @error('password')
            <div style="color: red;font-size: 13px">{{$message}}</div>
            @enderror
<br>
            <button type="submit" class="pure-button pure-button-primary">دخول</button>
        </form>
    </center>

    </body>
</html>
