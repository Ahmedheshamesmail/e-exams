@extends('master3')

@section('content')
<div style="width: 100%">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center align-content-center align-items-center" style="padding-top: 8vh">

               
                   @foreach($rowopen as $o)
                        @foreach($rows as $s)
                            @if($o->subject_id == $s->id)
                                @foreach($rowq as $q)
                                    @if($o->question_id == $q->id)
                                    <div class="app-section col-6" style="color: black;text-decoration: none;border-radius: 15px;padding: 15px;box-shadow: 5px 5px 5px -2px gray;border: 3px solid blue">
                                        <i class="fas fa-circle" style="color: red;font-size: 20px"></i><h4 style="padding-left: 20px">Request</h4>
                                        <hr>
                                    <span style="font-size: 18px">
                                        Subject : <span style="color: #006666;font-size: 16px">{{$s->name}}</span>
                                    </span><br>
                                    @foreach($rowd as $d)
                                        @if($d->id == $s->department_id)
                                            <span style="font-size: 18px">
                                                Department : <span style="color: #006666;font-size: 16px">{{$d->name}}</span>
                                            </span><br>
                                            @foreach($rowl as $l)
                                                @if($l->id == $d->level_id)
                                                <span style="font-size: 18px">
                                                            Level : <span style="color: #006666;font-size: 16px">{{$l->name}}</span>
                                                </span><br>
                                                @endif
                                            @endforeach
                                        @endif
                                        @endforeach<hr>
                                        <h5>Question :</h5>
                                        <span>
                                            "{{$q->text}}"
                                        </span>
                                    <br>                                    <br>
                                    <div style="border: 2px solid blueviolet;padding: 5px;border-radius: 5px;padding:10px">
                                        <h5 style="border-bottom: 1px solid #cccccc;width: 200px">Student Answer</h5> <i class="fas fa-arrow-circle-right"></i>
                                        <span>
                                            <i> {{$o->text}}</i>
                                        </span>
                                    </div>
                                    
                                        <hr>
                                        <form action="NewRank" method="post">
                                            {{csrf_field()}}
                                            <input class="form-control" type="number" name="degree" placeholder="Marks .." style="width: 200px">
                                            <input type="hidden" name="student" value="{{$o->student_id}}">
                                            <input type="hidden" name="question" value="{{$o->question_id}}">
                                            <input type="hidden" name="subject" value="{{$o->subject_id}}">
                                            <input type="submit" class="btn btn-success" style="float: right">
                                        </form>
                                        </div>
                                    <br>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                   @endforeach
               
            </div>
        </div>
    </div>
    @stop
