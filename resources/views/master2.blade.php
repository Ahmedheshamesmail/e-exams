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
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Admin Page</title>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/popper.js" type="text/javascript"></script>
    <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="../css/admain2.css" rel="stylesheet" type="text/css"/>
    <link href="../fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
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
        <div class="container">
            <div class="row flex-row justify-content-between align-content-center" style="padding-bottom: 20px;">
            <p class="logg"><i class="logg2">KFS </i>University</p>
                <ul class="mid">
                    <a href="../Requests" class="hovering" style="margin-right: 15px"><li>Requests</li></a>
                    <a href="../Levels" class="hovering" style="margin-right: 15px"><li>Levels</li></a>
                    <a href="../Add-student" class="hovering" style="margin-right: 15px"><li>Students</li></a>
                    <a href="../Departments" class="hovering" style="margin-right: 15px"><li>Departments</li></a>
                    <a href="../Subjects" class="hovering"><li>Subjects</li></a>
                </ul>
                <ul class="mid2 justify-content-center align-content-center flex-column" style="padding-top:10vh;">

                    @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 150px;height: 150px;border-radius:100px;margin-left: 10px;margin-bottom: 2vh;" >
                        @endif
                    @endforeach
                        <a href="../Profile" class="text-white" style="padding: 20px 0px 0px 0px;margin-bottom: 5vh">
                            <li style="margin-right: 15px" class="li"><i class="fas fa-user" style="margin-right: 10px;font-size: 20px"></i>{{$x->name}}</li>
                        </a><br>
                    <hr>
                    @endforeach
                    <a href="../A-Page" class="hovering" style="margin-bottom: 3vh"> <li class="li"><i class="fas fa-home" style="font-size: 20px"></i>Home</li></a>
                    <a href="../Requests" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-user-plus" style="font-size: 20px;margin-right: 7px;"></i>Requests</li></a>
                    <a href="../view" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-user-tie" style="font-size: 20px;margin-right: 7px;"></i>Professors</li></a>
                    <a href="../LogOut" class="hovering" style="margin-bottom: 3vh"><li class="li"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 7px;"></i>LogOut</li></a>
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
                    <a href="../A-Page" class="hovering"> <li>Home</li></a>
                    <a href="../Requests" class="hovering"><li>Requests</li></a>
                    <a href="../view" class="hovering"><li>Professors</li></a>
                    <a href="../Levels" class="hovering"><li>Levels</li></a>
                    <a href="../Add-student" class="hovering" ><li>Students</li></a>
                    <a href="../Departments" class="hovering"><li>Departments</li></a>
                    <a href="../Subjects" class="hovering"><li>Subjects</li></a>
                    <li></li>
                </ul>
                <div class="img-con justify-content-center align-content-between">
                @foreach($row as $x)
                <a href="../Profile" class="text-white" style="padding: 20px 0px 0px 0px">
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
                        <a href="../Profile" style="color: white">
                            {{$x->name}}
                        </a>
                        @endforeach
                    </p>
            </div>
            <hr>
            <ul class="d-flex flex-column justify-content-between align-content-between align-items-center">
                <li><a href="../A-Page"><i class="fas fa-home" style="font-size: 20px;margin-right: 15px;"></i> Home</a></li>
                <li><a href="../Requests"><i class="fas fa-user-plus" style="font-size: 20px;margin-right: 15px;"></i>Requests</a></li>
                <li><a href="../view"><i class="fas fa-user-tie" style="font-size: 20px;margin-right: 15px;"></i>Professors</a></li>
                <li><a href="../Levels"><i class="fas fa-list" style="font-size: 20px;margin-right: 15px;"></i>Levels</a></li>
                <li><a href="../Add-student"><i class="fas fa-id-card" style="font-size: 20px;margin-right: 15px;"></i>Students</a></li>
                <li><a href="../Departments"><i class="fab fa-buromobelexperte" style="font-size: 20px;margin-right: 15px;"></i>Departments</a></li>
                <li><a href="../Subjects"><i class="fab fa-buffer" style="font-size: 20px;margin-right: 15px;"></i>Subjects</a></li>
                <li><a href="../LogOut"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 15px;;"></i> Log out</a></li>
            </ul>
        </div>
        <i class="fas fa-times fon-0" style="color:white"></i>
        <a href="../Update-Image"> <i class="fas fa-camera x2"></i></a>
    </center>
</nav>
<section>
    <div class="container">
        <div class="row flex-row justify-content-between align-content-center align-items-center flex-wrap">
            @yield('contain')
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
<a href="../Choose">
    <i class="fas fa-plus exb" data-toggle="tooltip" data-placement="top" title="Begin An Exam"></i>
</a>

<script src="../js/app.js" type="text/javascript"></script>
</body>
</html>
