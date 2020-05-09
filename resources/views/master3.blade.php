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
    <link rel="icon" href="images.jpeg" style="border-radius: 20px">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Admin Page</title>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/popper.js" type="text/javascript"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="../css/admain3.css" rel="stylesheet" type="text/css"/>
    <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
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

                     <li class="hovering">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                Level
                            </a>
                            <div class="dropdown-menu" >
                                <ul>
                                    @foreach($rowl as $y)
                                    <li>
                                        <a href="../{{$y->id}}/Department-Select" class="text-primary dropdown-item">
                                            {{$y->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="hovering">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                Answers
                            </a>
                            <div class="dropdown-menu" >
                                <ul>
                                    @foreach($rowl as $y)
                                    <li>
                                        <a href="../{{$y->id}}/Choose-Subject" class="text-primary dropdown-item">
                                            {{$y->name}}
                                        </a>
                                    </li>
                                        <br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                </li>


                    <li class="hovering">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                Exam Structure
                            </a>
                           <div class="dropdown-menu">
                                <ul>
                                    @foreach($rowl as $y)
                                    <li>
                                        <a href="../../{{$y->id}}/ExamStructure" class="text-primary dropdown-item">
                                            {{$y->name}}
                                        </a>
                                    </li>
                                        <br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>


                    <li class="hovering">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                Exam Time
                            </a>
                           <div class="dropdown-menu">
                                <ul>
                                    @foreach($rowl as $y)
                                    <li>
                                        <a href="../../{{$y->id}}/Subject-Time" class="text-primary dropdown-item">
                                            {{$y->name}}
                                        </a>
                                    </li>
                                        <br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
                <ul class="mid2 justify-content-center align-content-center flex-column" style="padding-top:10vh;">

                    @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="Professor-img/{{$x->id}}/{{$i->img}}" style="width: 150px;height: 150px;border-radius:100px;margin-left: 10px;margin-bottom: 2vh;" >
                        @endif
                    @endforeach
                                        <a href="../Update-Image" class="conx2"> <i class="fas fa-camera x2"></i></a>

                        <a href="Profile" class="text-white" style="padding: 20px 0px 0px 0px;margin-bottom: 5vh">
                            <li style="margin-right: 15px;margin: 30px 0px;" class="li"><i class="fas fa-user" style="margin-right: 10px;font-size: 20px"></i>{{$x->name}}</li>
                        </a><br>
                    <hr>
                    @if($x->admin == 1)
                    <li  class="hovering" style="margin: 30px 0px;"><a href="../A-Page"  class="hovering"><i class="fas fa-home" style="font-size: 20px;margin-right: 7px"></i>Home</a></li>
                    @endif
                    @endforeach
                    <li style="margin: 30px 0px;"><a href="../Results"><i class="fas fa-poll" style="font-size: 20px;margin-right: 7px;"></i> Results</a></li>
                    <li style="margin: 30px 0px;"><a href="../LogOut"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 7px;"></i>Log out</a></li>
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

                        @foreach($row as $x)
                            @if($x->admin == 1)
                            <li  class="hovering"><a href="../A-Page"  class="hovering">Home</a></li>
                            @endif
                        @endforeach

                    <li class="hovering">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                Level
                            </a>
                            <div class="dropdown-menu" >
                                <ul>
                                    @foreach($rowl as $y)
                                    <li>
                                        <a href="../{{$y->id}}/Department-Select" class="text-primary dropdown-item">
                                            {{$y->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="hovering">
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        Answers
                    </a>
                    <div class="dropdown-menu" >
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../{{$y->id}}/Choose-Subject" class="text-primary dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li>
                                <br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>



                <li class="hovering">
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                         Exam Structure
                    </a>
                    <div class="dropdown-menu">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../../{{$y->id}}/ExamStructure" class="text-primary dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li><br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>


                <li class="hovering">
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        Exam Time
                    </a>
                   <div class="dropdown-menu">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../../{{$y->id}}/Subject-Time" class="text-primary dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li>
                                <br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>



                <a href="../Results" class="hovering"><li>Results</li></a>

                </ul>
                <div class="col-md-0 col-1 hamb">
                    <div class="container">
                        <div class="row align-content-between d-flex flex-column">
                            <div class="bg-light col-md-7 col-12 menu"></div>
                            <div class="bg-light col-md-7 col-12  menu"></div>
                            <div class="bg-light col-md-7 col-12 menu"></div>
                        </div>
                    </div>
                </div>
                 <div class="img-con  justify-content-center align-content-between">
                @foreach($row as $x)
                <a href="../Profile" style="padding: 20px 20px 0px 0px">
                    <h5>{{$x->name}}</h5>
                        </a>
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 50px;height: 50px;border-radius:50px;margin-top: 2px;" >
                        @endif

                    @endforeach
                    @endforeach
                    <a href="../Update-Image" class="conx2" style="margin-top: 2.7vh;margin-left:-12%;"> <i class="fas fa-camera x2" style="padding: 8px;background-color: gray;border-radius: 50px;"></i></a>
        </div>

                <a href="../LogOut" class="conx2log" style="margin-top:-2.5vh"> <i class="fas fa-sign-out-alt x2log"></i></a>
            </div>
        </div>
        <div class="nav-links d-flex flex-column justify-content-between align-content-between align-items-center">
            <div class="d-flex flex-column justify-content-center align-content-center align-items-center icons">
                @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="../Professor-img/{{$x->id}}/{{$i->img}}" style="width: 200px;height: 200px;border-radius:150px">
                        @endif
                        @if($i->professor_id != $x->id)
                            <i class="fas fa-user-circle"></i>
                        @endif
                    @endforeach
                                        <a href="../Update-Image" style="margin-top: -5vh;margin-right: -65%;"> <i class="fas fa-camera" style="padding: 10px;background-color: gray;border-radius: 50px;font-size: 20px;color: white"></i></a>


            </div>
            <ul class="d-flex flex-column justify-content-between align-content-between align-items-center">
                <li>
                        <a href="../Profile" style="color: white">
                            {{$x->name}}
                        </a>
                        <br><hr>
                        @endforeach
                    </li>
                <li>
                    @foreach($row as $x)
                        @if($x->admin == 1)
                            <a href="../A-Page"><i class="fas fa-home" style="font-size: 20px;margin-right: 15px;"></i> Home</a>
                        @endif
                        @if($x->admin == 0)
                            <a href="../Profile"><i class="fas fa-home" style="font-size: 20px;margin-right: 15px;"></i> Home</a>
                        @endif
                     @endforeach
                </li>
                <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-list" style="font-size: 20px;margin-right: 15px;"></i>Level
                    </a>
                    <div class="dropdown-menu" style="height: 27vh">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../{{$y->id}}/Department-Select" class="text-primary dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>
                <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-spell-check" style="font-size: 20px;margin-right: 15px;"></i>Answers
                    </a>
                    <div class="dropdown-menu" style="height: 27vh">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../{{$y->id}}/Choose-Subject" class="text-primary  dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li>
                                <br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>



                <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-building" style="font-size: 20px;margin-right: 15px;"></i> Exam Structure
                    </a>
                    <div class="dropdown-menu" style="height: 27vh">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../../{{$y->id}}/ExamStructure" class="text-primary  dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li><br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>


                <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-clock" style="font-size: 20px;margin-right: 15px;"></i> Exam Time
                    </a>
                   <div class="dropdown-menu" style="height: 27vh">
			<ul>
                            @foreach($rowl as $y)
                            <li>
                                <a href="../../{{$y->id}}/Subject-Time" class="text-primary dropdown-item">
                                    {{$y->name}}
                                </a>
                            </li>
                                <br>
                            @endforeach
			</ul>
                    </div>
		</div>
                </li>

                <li><a href="../Results"><i class="fas fa-poll" style="font-size: 20px;margin-right: 15px;"></i> Results</a></li>
                <li><a href="../LogOut"><i class="fas fa-sign-out-alt"  style="font-size: 20px;margin-right: 15px;"></i>Log out</a></li>
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
<script src="../js/app.js" type="text/javascript"></script>
</body>
</html>
