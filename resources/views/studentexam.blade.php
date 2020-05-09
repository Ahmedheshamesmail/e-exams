
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Exam</title>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <link href="css/exam.css" rel="stylesheet" type="text/css"/>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<section style="height: 100px;">
    <div class="container">
        <div class="row d-flex flex-nowrap justify-content-center align-content-center flex-row" style="padding-top: 2vh;font-size: 20px">
            <div style="display: inline-flex;padding: 0px 5%">
                @foreach($s as $st)
                @foreach($rowl as $l)
                    @if($l->id == $st->level_id)
                Level : {{$l->name}}
                        @endif
                    @endforeach
                <br>
                    @foreach($rowd as $d)
                        @if($d->id == $st->department_id)
                Department : {{$d->name}}
                            @endif
                        @endforeach
                    @endforeach
            </div>
            <div style="display: inline-flex;padding: 0px 5%">
                <p><i>Kfs University</i><br>
                    @foreach($rows as $sub)
                        @if($sub->id == $subject)
                           Subject : {{$sub->name}}
                            @endif
                        @endforeach
                    </p>
            </div>
            <div style="display: inline-flex;padding: 0px 5%">

                @foreach($rowt as $t)
                        @if($t->subject_id == $subject)
                        Time : {{$t->time}} Hours<br>
                            @endif
                    @endforeach
                @foreach($rows as $ss)
                    @if($ss->id == $subject)
                        @foreach($rowp as $p)
                            @if($p->id == $ss->professor_id)
                                    DR : {{$p->name}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
</section>
<br><hr>
<section>
    <div class="container">
        <div class="row" style="font-size: 20px">
                <table class="table table-dark col-11" style="margin: auto">
                    <tr>
                        <th>Day</th>
                        <td><?php echo  date("l"); ?></td>
                    </tr>
                    <tr>
                        <th>Time Remains</th>
                        <td>
                            <div class="col-6" id="intervals">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        @foreach($s as $st)
                        <th> Student Name</th>
                        <td>{{$st->name}}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>{{$st->id}}</td>
                        @endforeach
                    </tr>
                </table>
            <form class="my_form" action="sa" method="post" enctype="multipart/form-data" style="width: 100%">
                {{csrf_field()}}
            <ol type="1">
            @foreach($da2 as $tru)
                    @foreach($rowq as $q)
                        @if($q->id == $tru->question_id)
                                        <li style="margin: 15vh 0px;width: 100%">
                                            {{$q->text}}
                                            @foreach($rowat as $at)
                                                @if($at->question_id == $q->id)
                                                @if($at->fileattache_id == 1)<br><br>
                                                <center>
                                                <img src="att/img/{{$at->name}}" class="imgfluid col-md-6 col-10" style="margin:15px;">
</center>
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
                                            @endforeach
                                                <ol type="1" class="in" style="padding-top: 4vh;width: 100%">
                                                    @if($q->typeq_id == 3)
                                                    @foreach($rowans as $a)
                                                        @if($a->question_id == $q->id)
                                                            <li style="display: inline;">
                                                                <input type="radio" name="answer{{$q->id}}" value="{{$q->id}}{{$a->text}}" id="{{$a->id}}" style="font-size: 20px;margin-right: 5px;margin-left: 10%"><label for="{{$a->id}}"> {{$a->text}}</label>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                        @endif
                                                        @if($q->typeq_id == 1)
                                                    @foreach($rowans as $a)
                                                        @if($a->question_id == $q->id)
                                                            <li style="display: inline;" class="d-flex justify-content-center align-items-center row">
                                                                    <input type="checkbox"  name="answer{{$a->id}}"  value="{{$q->id}}{{$a->text}}" id="{{$a->id}}" style="font-size: 20px;margin-right: 5px;">
                                                                        <label for="{{$a->id}}"> {{$a->text}}</label>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                        @endif
                                                        @if($q->typeq_id == 2)
                                                            <li style="display: inline;">
                                                                <textarea class="form-control" cols="5" rows="10" name="{{$q->id}}" placeholder="Enter you Answer ..."></textarea>
                                                            </li>
                                                        @endif
                                                </ol>
                                        </li><hr>
                        @endif
                    @endforeach
             @endforeach
            </ol>
            <center>
                <input class="btn btn-primary col-6" type="submit" value="End Exam" style="margin-bottom:2vh">
</center>
            </form>
        </div>
    </div>
</section>
<script>
var seconds = {{$time}},
                secondPass,
                intervals = document.getElementById('intervals'),
                countDown = setInterval(function(){
                    "use strict";
                    secondPass();
                },1000);
            function secondPass(){
                "use strict";
                var hour = Math.floor(seconds / 3600);
                var min =  Math.floor((seconds % 3600)/60);
                var remSeconds = seconds % 60;
                var hours ;
                if(hour >= 12){
                    hours = hour - 12;
                }else{
                    hours = hour;
                }
                intervals.innerHTML = hours + ":" +  min + ":" + remSeconds;
                if(seconds > 0 ){

                    seconds = seconds - 1;
                }
                else{
                    clearInterval(countDown);
                   $('form.my_form').trigger('submit');
                }
            }
        window.onbeforeunload = function() {
    return "Are you sure you want to leave? your answers will be removed!";
            }
</script>
</body>
</html>
