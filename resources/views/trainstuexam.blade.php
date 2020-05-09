<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student</title>
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <link rel="stylesheet" type="text/css" href="css/student.css">
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
    <style>

p.logg{
    color: white;padding-left: 20px;padding-top: 20px;height:70px;
}
.logg2{
    padding:20px 12px;background-color: white;border-radius: 180px;margin-right: 3px;color: darkviolet;
}
@media screen and (max-width: 768px){

 p.logg{
    color: white;padding-left: 20px;padding-top: 20px;
}

.alerted-drop-down{
    position: absolute;
    z-index: 300;
    left: -40%;
    width: 400px;

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
                <div class="row flex-row justify-content-between align-content-center align-items-center">
                <p class="logg"><i class="logg2">KFS </i>University</p>
                </div>
            </div>
        </center>
    </nav>
    <span style="margin: 15px;">
    <p style="font-size: 20px;padding-left: 20px;">
    Subject :
    @foreach($rows as $s)
        @if($s->id == $sub)
            {{$s->name}}
        @endif
    @endforeach
    </p>
    </span><hr>

    <section style="width: 100%;">
        <div class="container">
            <div class="row flex-row justify-content-center align-content-center align-items-center flex-wrap" style="padding-top:  5vh;color: black">
                <form action="endtrain" method="post" enctype="multipart/form-data" style="width: 100%">
                    {{csrf_field()}}
                <ol  style="color: black;font-size: 22px;width: 100%">
                @foreach($rowco as $co)
                    @foreach ($rowtrain as $t)
                        @foreach($rowq as $q)
                            @if($t->question_id == $q->id)
                                @if($t->chapter_id == $co->chapter_id)
                                <li style="color: black;width: 100%"><i class="fas fa-circle" style="margin: 0px 5px;font-size:10px"></i>{{$q->text}}<br>
                                    @foreach($rowat as $at)
                                        @if($q->typeq_id == 3)
                                            @if($at->question_id == $q->id)
                                                @if($at->fileattache_id == 1)<br><br>
                                                    <img src="att/img/{{$at->name}}" class="imgfluid col-md-6 col-12" style="margin:15px;">
                                                @endif
                                                @if($at->fileattache_id == 2)<br><br>
                                                            <audio controls loop preload="auto" style="outline:0;">
                                                                <source src="att/audio/{{$at->name}}" type="audio/mpeg">
                                                                <source src="att/audio/{{$at->name}}" type="audio/ogg">
                                                                Your Browser Does Not Support Audio Technology!!
                                                            </audio>
                                                @endif
                                                @if($at->fileattache_id == 3)<br><br>
                                                            <video controls>
                                                                <source src="att/video/{{$at->name}}" type="video/mp4">
                                                                <source src="att/video/{{$at->name}}" type="video/ogg">
                                                                Your Browser Does Not Support Video Technology!!
                                                            </video>
                                                @endif
                                            @endif
                                        @endif
                                        @if($q->typeq_id == 1)
                                            @if($at->question_id == $q->id)
                                                @if($at->fileattache_id == 1)<br><br>
                                                            <img src="att/img/{{$at->name}}" class="imgfluid col-md-6 col-12" style="margin:15px;">
                                                                @endif
                                                            @if($at->fileattache_id == 2)<br><br>

                                                            <audio controls loop preload="auto" style="outline:0;" class="col-12">
                                                                <source src="att/audio/{{$at->name}}" type="audio/mpeg">
                                                                <source src="att/audio/{{$at->name}}" type="audio/ogg">
                                                                Your Browser Does Not Support Audio Technology!!
                                                            </audio>
                                                @endif
                                                @if($at->fileattache_id == 3)<br><br>
                                                            <video controls class="col-12">
                                                                <source src="att/video/{{$at->name}}" type="video/mp4">
                                                                <source src="att/video/{{$at->name}}" type="video/ogg">
                                                                Your Browser Does Not Support Video Technology!!
                                                            </video>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                    <ul class="d-flex justify-content-center align-items-center flex-wrap align-content-center" style="padding:7px">
                                        @if($q->typeq_id == 3)
                                            @foreach($rowans as $a)
                                                @if($a->question_id == $q->id)
                                                    <li  class="d-flex justify-content-center align-items-center col-md-2 col-6"  style="display: inline;color: #330066;">
                                                        <input type="radio" style="margin:0px 10px;" name="answer{{$q->id}}" value="{{$q->id}}{{$a->text}}" id="{{$a->id}}" ><label for="{{$a->id}}"> {{$a->text}}</label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if($q->typeq_id == 1)
                                            @foreach($rowans as $a)
                                                @if($a->question_id == $q->id)
                                                <li class="d-flex justify-content-center align-items-center col-md-3 col-6" style="display: inline;color: #330066;">
                                                        <input type="checkbox" name="answer{{$a->id}}" style="margin:0px 10px;" value="{{$q->id}}" id="{{$a->id}}"><label for="{{$a->id}}"> {{$a->text}}</label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </li><br><br>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                </ol>
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" class="btn btn-outline-success col-3" value="End Exam" style="margin-right: 15px;margin-left: 15px;">
                    <a href="Endinig" class="col-3">
                        <input type="button" class="btn btn-danger" value="Cancel">
                    </a>
                </div>
                    <br><br>
               </form>
            </div>
        </div>
    </section>
    <script src="js/app.js" type="text/javascript"></script>
</body>
</html>
