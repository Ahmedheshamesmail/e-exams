<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html >
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <title>الصفحه الرئيسيه</title>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/popper.js" type="text/javascript"></script>
    <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="../css/admain.css" rel="stylesheet" type="text/css"/>
    <link href="../fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav>
    <center>
        @if (Session::has('nulls'))
            <div class="alert alert-success animated alerted-drop-down justify-content-center" role="alert">
                <h4 class="alert-heading">تنبيه !</h4>
                <p>{{ Session::get('nulls') }}.</p>
                <center><button class="button-alert">إغلاق</button></center>
            </div>
        @endif



        <div class="container">
            <div class="row flex-row justify-content-between align-content-center" style="padding-bottom: 20px;">

            <p class="logg"><i class="logg2">KFS </i>University</p>
       <ul class="mid">
                    <a href="Requestsa" class="hovering" style="margin-right: 15px"><li>طلبات التسجيل</li></a>
                    <a href="Levelsa" class="hovering" style="margin-right: 15px"><li>الصف</li></a>
                    <a href="Add-studenta" class="hovering" style="margin-right: 15px"><li>الطلاب</li></a>
                    <a href="Departmentsa" class="hovering" style="margin-right: 15px"><li>الاقسام</li></a>
                    <a href="Subjectsa" class="hovering"><li>المواد</li></a>
                </ul>
                <ul class="mid2 justify-content-center align-content-center flex-column" style="padding-top:10vh;">

                    @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 150px;height: 150px;border-radius:100px;margin-left: 10px;margin-bottom: 2vh;" >
                        @endif
                    @endforeach
                        <a href="Profilea" class="text-white" style="padding: 20px 0px 0px 0px;margin-bottom: 5vh">
                            <li style="margin-right: 15px" class="li"><i class="fas fa-user" style="margin-right: 10px;font-size: 20px"></i>{{$x->name}}</li>
                        </a><br>
                    <hr>
                    @endforeach
                    <a href="A-Pagea" class="hovering" style="margin-bottom: 3vh"> <li class="li"><i class="fas fa-home" style="font-size: 20px"></i>الصفحه الرئيسيه</li></a>
                    <a href="Requestsa" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-user-plus" style="font-size: 20px;margin-right: 7px;"></i>طلبات التسجيل</li></a>
                    <a href="viewa" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-user-tie" style="font-size: 20px;margin-right: 7px;"></i>المدرسين</li></a>
                    <a href="LogOuta" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 7px;"></i>الخروج</li></a>
                </ul>
                <i class="fas fa-times xx3"></i>
                <div class="col-md-1 col-2 h22">
                    <div class="container">
                        <div class="row align-content-between justify-content-between d-flex flex-column">
                            <div class="bg-light col-md-10 col-10 menu"></div>
                            <div class="bg-light col-md-10 col-10  menu"></div>
                            <div class="bg-light col-md-10 col-10 menu"></div>
                        </div>
                    </div>
                </div>
                <ul class="naving">
                    <a href="A-Pagea" class="hovering"> <li>الصفحه الرئيسيه</li></a>
                    <a href="Requestsa" class="hovering"><li>طلبات التسجيل</li></a>
                    <a href="viewa" class="hovering"><li>المدرسين</li></a>
                    <a href="Levelsa" class="hovering"><li>الصف</li></a>
                    <a href="Add-studenta" class="hovering" ><li>الطلاب</li></a>
                    <a href="Departmentsa" class="hovering"><li>الاقسام</li></a>
                    <a href="Subjectsa" class="hovering"><li>المواد</li></a>
                    <li></li>
                </ul>
                <div class="img-con justify-content-center align-content-between">
                @foreach($row as $x)
                <a href="Profilea" class="text-white" style="padding: 20px 0px 0px 0px">
                    <h5>{{$x->name}}</h5>
                        </a>
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 50px;height: 50px;border-radius:50px;margin-left: 10px;margin-bottom: 30px;" >
                        @endif
                        @if($i->professor_id != $x->id)
                            <i class="fas fa-user-circle"></i>
                        @endif
                    @endforeach
                    @endforeach
                </div>
                <div class="col-md-0 col-2 hamb">
                    <div class="container">
                        <div class="row align-content-between d-flex flex-column">
                            <div class="bg-light col-md-5 col-10 menu"></div>
                            <div class="bg-light col-md-5 col-10  menu"></div>
                            <div class="bg-light col-md-5 col-10 menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-links d-flex flex-column justify-content-around align-content-around align-items-center">
            <div class="d-flex flex-column justify-content-center align-content-center align-items-center icons" >
                @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 100px;height: 100px;border-radius:50px;margin-top: 2vh">
                        @endif
                        @if($i->professor_id != $x->id)
                            <i class="fas fa-user-circle"></i>
                        @endif
                    @endforeach
                    <br>
                    <p>
                        <a href="Profilea" style="color: white">
                            {{$x->name}}
                        </a>
                        @endforeach
                    </p>
            </div>
            <hr>
            <ul class="d-flex flex-column justify-content-between align-content-between align-items-center">
                <li><a href="A-Pagea"><i class="fas fa-home" style="font-size: 20px;margin-right: 15px;"></i> الصفحه الرئيسيه</a></li>
                <li><a href="Requestsa"><i class="fas fa-user-plus" style="font-size: 20px;margin-right: 15px;"></i>طلبات التسجيل</a></li>
                <li><a href="viewa"><i class="fas fa-user-tie" style="font-size: 20px;margin-right: 15px;"></i>المدرسين</a></li>
                <li><a href="Levelsa"><i class="fas fa-list" style="font-size: 20px;margin-right: 15px;"></i>الصف</a></li>
                <li><a href="Add-studenta"><i class="fas fa-id-card" style="font-size: 20px;margin-right: 15px;"></i>الطلاب</a></li>
                <li><a href="Departmentsa"><i class="fab fa-buromobelexperte" style="font-size: 20px;margin-right: 15px;"></i>الاقسام</a></li>
                <li><a href="Subjectsa"><i class="fab fa-buffer" style="font-size: 20px;margin-right: 15px;"></i>المواد</a></li>
                <li><a href="LogOuta"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 15px;"></i> الخروج</a></li>
            </ul>
        </div>
        <i class="fas fa-times fon-0" style="color:white"></i>
    </center>
</nav>
<section>
    <div class="container">
        <div class="row flex-row justify-content-between align-content-center align-items-center flex-wrap">
            @yield('content')
        </div>
    </div>
</section>
<!---
<button type="button" class="btn btn-primary">
    Profile <span class="badge badge-light">9</span>
    <span class="sr-only">unread messages</span>
</button>
<div class="alert alert-warning" role="alert">
    This is a warning alert—check it out!
</div>
<div class="alert alert-info" role="alert">
    This is a info alert—check it out!
  </div>
  <div class="alert alert-light" role="alert">
    This is a light alert—check it out!
  </div>
  <div class="alert alert-dark" role="alert">
    This is a dark alert—check it out!
  </div>
--->
<a href="Choosea">
    <i class="fas fa-plus exb" data-toggle="tooltip" data-placement="top" title="بدء امتحان"></i>
</a>

<script src="../js/app.js" type="text/javascript"></script>
</body>
</html>
