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
    <link href="css/admain.css" rel="stylesheet" type="text/css"/>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>

    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
    <style>
    .imgv{
        height: 500px;
    }
.proff{
    width: 50px;height: 50px;border-radius:50px;margin-top: 10px;
}
    @media screen and (max-width: 1335px) and (min-width: 769px){

    .proff{
        margin-top: -10px;
    }
}
    </style>
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
            <div class="row d-flex justify-content-between align-content-center ">
            <p class="logg"><i class="logg2">KFS </i>University</p>
                @foreach($row as $x)
                    <a href="Profile" style="color: white">
                        {{$x->name}}

                            @foreach($imr as $i)
                                @if($i->professor_id == $x->id)
                                    <img src="Professor-img/{{$x->id}}/{{$i->img}}" class="proff">
                                @endif
                            @endforeach
                    </a>
                @endforeach
            </div>
        </div>
        <div class="nav-links d-flex flex-column justify-content-around align-content-around align-items-center">
            <div class="d-flex flex-column justify-content-center align-content-center " >
                @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                            <img src="Professor-img/{{$i->img}}" style="width: 100px;height: 100px;border-radius:50px;margin-top: 1vh">
                        @endif
                        @if($i->professor_id != $x->id)
                            <i class="fas fa-user-circle"></i>
                        @endif
                    @endforeach
                    <br>
                    <p>
                        <a href="Profile" style="color: white">
                            {{$x->name}}
                        </a>
                        @endforeach
                    </p>
            </div>
            <hr>

        </div>
       </center>
</nav>
<section>
    <div class="container">
        <div class="row flex-row justify-content-between align-content-center align-items-center flex-wrap" style="padding-top: 5vh">
            @foreach($row as $x)
                    @foreach($imr as $i)
                        @if($i->professor_id == $x->id)
                        <img src="../Professor-img/{{$x->id}}/{{$i->img}}" class="col-md-7 col-12 imgv" style="border-radius:100px;margin-top: 1vh">
                        @endif
                        @if($i->professor_id != $x->id)
                            <i class="fas fa-user-circle"></i>
                        @endif
                    @endforeach
                @endforeach
            <form action="Updated-Image" method="post" enctype="multipart/form-data" style="margin-top: 8vh">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Select Image</span>
                    </div>
                    <input type="file" name="img" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                <input type="submit" class="btn btn-success" value="Update">
                @if($x->admin == 0)
                    <a href="Profile">
                        <input type="button" class="btn btn-block" value="Cancel">
                    </a>
                @endif
                @if($x->admin == 1)
                    <a href="A-Page">
                        <input type="button" class="btn btn-block" value="Cancel">
                    </a>
                @endif
            </form>

        </div>
    </div>
</section>
<script src="js/app.js" type="text/javascript"></script>
</body>
</html>
