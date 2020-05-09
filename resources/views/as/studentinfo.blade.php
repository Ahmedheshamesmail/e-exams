<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>الطالب</title>
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../css/student.css">
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/popper.js" type="text/javascript"></script>
    <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="../fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
    <style>

@media screen and (max-width: 768px){


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
                    <h4 class="alert-heading">تنبيه !</h4>
                    <p>{{ Session::get('nulls') }}.</p>
                    <center><button class="button-alert">إغلاق</button></center>
                </div>
            @endif
            <div class="container">
                <div class="row flex-row justify-content-between align-content-center" style="overflow:hidden">
                <p style="color: white;padding-left: 20px;padding-top: 20px;;height:80px" ><i style="padding:18px 8px;background-color: white;border-radius: 180px;margin-right: 3px;color: darkviolet;">KFS </i>University</p>
                    <a href="LogOuta" style="float: right;color: white;font-size: 30px;padding: 7px;border-radius: 5px;"><i class="fas fa-sign-out-alt" style="margin-right: 7px;"></i></a>

                </div>
            </div>
        </center>
    </nav>
    <section>
        <div class="container">
            <div class="row flex-row justify-content-between align-content-center align-items-center flex-wrap" style="padding-top:  5vh">
                <div class="col-md-6 col-12" style="border-right: 1px solid black">
                    <h3>الامتحانات الحاليه</h3>

                    <table class="table border-dark">
                        <thead>
                        <tr>
                            <th scope="col">الماده</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($rowd as $d)
                            @foreach($rowstu as $s)
                                @if($d->id == $s->department_id)
                                @foreach($rows as $r)
                                    @if($d->id == $r->department_id)
                                        @foreach($rowopen as $oo)
                                            @if($oo->subject_id == $r->id)
                                            <tr>
                                                <td>{{$r->name}}</td>
                                                <td>
                                                    <a href="{{$r->id}}/subid3a">
                                                        <button class="btn btn-primary" style="padding-left: 30px;padding-right: 30px;">
                                                            بدء
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                    @endif
                                @endforeach
                            @endif
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                    <br><hr><br>
                    <h3>الامتحانات السابقه</h3>
                    <table class="table">
                        <thead>
                            <th>الماده</th>
                            <th>النتيجه</th>
                        </thead>
                        <tbody>
                        @foreach($rowr as $r)
                            @foreach($rowstu as $st)
                                @if($st->id == $r->student_id)
                                    @foreach($rows as $s)
                                        @if($s->id == $r->subject_id)

                                            <tr>
                                                <td>
                                                    {{$s->name}}
                                                </td>
                                                <td>
                                                    <p style="padding: 10px 30px;background-color: grey;color: white;border-radius: 20px">{{$r->result}}</p>
                                                </td>
                                            </tr>

                                            @endif
                                        @endforeach
                                    @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <p style="padding:10px;border:1px solid green">
                    تقييمك : <span id="rank"></span> %
                    <p>
                </div>
                <div class="col-md-6 col-12">
                    <h3>بيانات الطالب</h3>
                   <table class="table-hover table-striped" style="width: 100%">
                       <tbody>
                       @foreach($rowstu as $stu)
                           <tr>
                               <th>الاسم</th>
                               <td>{{$stu->name}}</td>
                           </tr>
                           <tr>
                               <th>الرقم الجامعي</th>
                               <td>{{$stu->id}}</td>
                           </tr>
                           <tr>
                               <th>الصف</th>
                               <td>
                                   @foreach($rowl as $l)
                                       @if($stu->level_id == $l->id)
                                           {{$l->name}}
                                       @endif
                               @endforeach
                               </td>
                           </tr>
                           <tr>
                               <th>القسم</th>
                               <td>@foreach($rowd as $d)
                                       @if($stu->department_id == $d->id)
                                           {{$d->name}}
                                       @endif
                                   @endforeach</td>
                           </tr>
                           <tr>
                               <th>كلمة السر</th>
                               <td>

                                   @if (Session::has('pCovered'))
                                       {{ Session::get('pCovered') }}
                                   @endif
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                    <br><hr><br>
                    <h3>
                        الاختبارات التجريبيه
                    </h3>
                    <table class="table">
                        <thead>
                            <th>الماده</th>
                        </thead>
                        <tbody>
                            @foreach($rows2 as $s2)
                                <tr>
                                    <td>{{$s2->name}}</td>
                                    <td>
                                        <button class="btn btn-info"  data-toggle="modal" data-target="#exampleModal{{$s2->id}}">
                                            الفصول
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$s2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$s2->id}}" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$s2->id}}">اختيار فصل :</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                                <form action="starttraina" method="post">
                                                    <div class="modal-body d-flex justify-content-center col-12 flex-column  " >

                                                      {{csrf_field()}}
                                                    @foreach($rowc as $c)
                                                      @if($c->subject_id == $s2->id)
                                                      <input type="checkbox" name="{{$c->id}}{{$s2->id}}" id="{{$c->id}}" value="{{$c->name}}" >
                                                            <label class="col-9"  style="margin-top: -20px;margin-left: 10px;" for="{{$c->id}}">{{$c->name}}</label><br><br>
                                                            <input type="hidden" name="subject" value="{{$s2->id}}">
                                                        @endif
                                                      @endforeach

                                              </div>
                                              <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">بدء</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                              </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <i class="fas fa-download" onclick="window.print()" style="float: right;cursor: pointer;color: #823fff;font-size: 25px;margin-bottom: 2.5vh;margin-left: 5%;"></i>
        </div>
    </section>
    <script src="../js/app.js" type="text/javascript"></script>
    <script>
        var rank1 = 0;
        var rank2 = 0;

        rank1 = rank1 +{{$finalRank}};

        rank2 =rank2 + {{$finalRating}} ;

        var shRank = document.getElementById("rank");
        var rating = (rank1 * 100) / rank2;
        if (isNaN(rating)){
            rating ='-------';
        }
            shRank.innerHTML = rating;


</script>
</body>
</html>
