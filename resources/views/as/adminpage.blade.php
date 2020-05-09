
@extends('as.master')
@section('content')
                    <div class="col-12 side" style="margin-top: 7vh;height: auto;font-size: 18px;padding: 25px">
                        <p style="font-size: 23px">طلبات التسجيل</p>
                        <hr>
                        @foreach($rowrqs as $s)
                        الاسم : <span style="color:green;font-size: 16px">{{$s->name}}</span><br>
                        الرقم القومي : <span style="color:green;font-size: 16px">{{$s->Nationalid}}</span><br>
                            @foreach($rowd as $d)
                                @if($d->id == $s->department_id)
                                الشعبه : <span style="color:green;font-size: 16px">{{$d->name}}</span><br>
                                @endif
                            @endforeach
                            @foreach($rowl as $l)
                                @if($l->id == $s->level_id)
                                 المستوي : <span style="color:green;font-size: 16px">{{$l->name}}</span>
                                <a href="{{$s->id}}/removestudenta"  style="float: right;margin-right: 5%">
                                    <button class="btn btn-danger">رفض</button>
                                </a>
                                <a href="{{$s->id}}/acceptstudenta"  style="float: right;margin-right: 5%">
                                    <button class="btn btn-success">قبول</button>
                                </a>
                                <br><hr>
                                
                                @endif
                            @endforeach
                        @endforeach
                    </div>
@stop
