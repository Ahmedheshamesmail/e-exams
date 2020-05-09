<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/app.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/app.min.js"></script>
        <script src="../js/zepto.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>المدرس</title>
        <link href="../css/main-prof.css" rel="stylesheet" type="text/css"/>
        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../pure-release-1.0.1/pure-min.css" >
        <link rel="stylesheet" href="../pure-release-1.0.1/grids-responsive-min.css" >

    </head>
    <body style="  background: linear-gradient(to bottom,#9817b6,#bd1de2,#cf26d9,#de68e5,#e587ea);">
    @if (Session::has('nulls'))
        <div class="alert alert-success animated alerted-drop-down justify-content-center" role="alert">
            <h4 class="alert-heading">تنبيه !</h4>
            <p>{{ Session::get('nulls') }}.</p>
            <center><button class="button-alert">إغلاق</button></center>
        </div>
    @endif
    <p style="font-size: 20px;color: white;padding-left: 20px;padding-top: 20px"><i style="padding:15px 10px;background-color: white;border-radius: 180px;margin-right: 3px;color: darkviolet;font-size: 20px">KFS </i>University</p>
    <a href="Logina" style="position: absolute;right: 50px;top: 10px;">
        <button class="btn btn-block">دخول</button>
    </a>
    <hr>
    <center style="padding-top: 20vh">

                <form action="insertprofa" class="pure-form pure-form-stacked" method="post" style="padding: 15px;height: auto;width: 280px;background-color: white;box-shadow: -5px 2px 20px 2px gray;border-radius: 20px;">
           {{csrf_field()}}
                    <fieldset>
                        <legend>مرحبا بك <i class="fas fa-smile" style="color: rgba(230,217,31,0.96);"></i> </legend>
                        <div class="pure-control-group">
                            <input id="name" type="text" name="name" placeholder="الاسم .." style="padding-bottom: 10px" value="{{old('name')}}">
                            @error('name')
                            <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="text" name="phone" placeholder="ادخل رقم الهاتف .." style="padding-bottom: 10px" value="{{old('phone')}}">
                        @error('phone')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                        @enderror
                        <input type="password" name="password" placeholder="كلمة السر" style="padding-bottom: 10px">
                        @error('password')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                        @enderror
                        <button type="submit" class="pure-button pure-button-primary">تسجيل</button>
                    </fieldset>

                </form>
    </center>
      <script>
      App.controller('home', function (page) {
        // put stuff here
      });

      App.controller('page2', function (page) {
        // put stuff here
      });

      try {
        App.restore();
      } catch (err) {
        App.load('home');
      }
    </script>
    </body>
</html>
